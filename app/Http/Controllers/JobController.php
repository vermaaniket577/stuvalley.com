<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\JobPosting;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    /**
     * Display the job details page.
     */
    public function show($slug)
    {
        $job = JobPosting::where('slug', $slug)->active()->firstOrFail();
        return view('company.job-details', compact('job'));
    }

    /**
     * Display the job application page.
     */
    public function showApplyPage($slug)
    {
        $job = $this->getJob($slug);
        return view('company.apply', compact('job'));
    }

    /**
     * Handle job application submission.
     */
    public function apply(Request $request, $slug)
    {
        try {
            $job = $this->getJob($slug);

            // Validate request
            $validator = Validator::make($request->all(), [
                'full_name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'country_code' => 'required|string|max:10',
                'phone' => 'required|string|max:20',
                'resume' => 'required|file|mimes:pdf,doc,docx|max:51200', // 50MB max
                'cover_letter' => 'nullable|string|max:5000',
            ]);

            if ($validator->fails()) {
                \Log::error('Validation failed', ['errors' => $validator->errors()->toArray()]);
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Handle file upload
            if (!$request->hasFile('resume')) {
                \Log::error('Resume file not found in request');
                return response()->json([
                    'success' => false,
                    'message' => 'Resume file is required.'
                ], 422);
            }

            $file = $request->file('resume');

            // Check if file is valid
            if (!$file->isValid()) {
                \Log::error('Invalid file upload', [
                    'error' => $file->getError(),
                    'error_message' => $file->getErrorMessage()
                ]);
                return response()->json([
                    'success' => false,
                    'message' => 'The uploaded file is invalid or corrupted.'
                ], 422);
            }

            // Read binary content
            $binaryData = file_get_contents($file->getRealPath());

            // Combine country code and phone
            $fullPhone = $request->country_code . ' ' . $request->phone;

            \Log::info('Attempting to create job application', [
                'job_id' => $job->id,
                'full_name' => $request->full_name,
                'email' => $request->email,
                'phone' => $fullPhone,
                'file_size' => strlen($binaryData),
                'filename' => $file->getClientOriginalName(),
                'mime' => $file->getMimeType()
            ]);

            // Create application with Binary storage
            $application = JobApplication::create([
                'job_posting_id' => $job->id,
                'full_name' => $request->full_name,
                'email' => $request->email,
                'phone' => $fullPhone,
                'resume_path' => null, // Not using file system storage
                'resume_data' => $binaryData,
                'resume_filename' => $file->getClientOriginalName(),
                'resume_mime' => $file->getMimeType(),
                'resume_size' => $file->getSize(),
                'cover_letter' => $request->cover_letter,
            ]);

            \Log::info('Job application created successfully', ['application_id' => $application->id]);

            return response()->json([
                'success' => true,
                'message' => 'Your application has been submitted successfully! We will get back to you soon.'
            ], 200);

        } catch (\Illuminate\Database\QueryException $e) {
            \Log::error('Database error in job application', [
                'error' => $e->getMessage(),
                'sql' => $e->getSql() ?? 'N/A',
                'bindings' => $e->getBindings() ?? [],
                'code' => $e->getCode()
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Database error occurred. Please contact support if this persists.',
                'debug' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        } catch (\Exception $e) {
            \Log::error('Error in job application', [
                'error' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json([
                'success' => false,
                'message' => 'An unexpected error occurred: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Helper to get job or create open application placeholder
     */
    private function getJob($slug)
    {
        if ($slug === 'open-application') {
            return JobPosting::firstOrCreate(
                ['slug' => 'open-application'],
                [
                    'title' => 'Open Application',
                    'department' => 'General',
                    'location' => 'Remote / Global',
                    'job_type' => 'Full-time',
                    'experience_level' => 'Entry Level',
                    'description' => 'General application pool for future opportunities.',
                    'responsibilities' => 'To be determined based on role.',
                    'requirements' => 'Various skills and experiences welcome.',
                    'is_active' => true,
                    'positions' => 999
                ]
            );
        }
        return JobPosting::where('slug', $slug)->active()->firstOrFail();
    }
}
