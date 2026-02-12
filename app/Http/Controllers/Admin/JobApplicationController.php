<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    public function index(Request $request)
    {
        $jobId = $request->get('job_id');
        $jobs = \App\Models\JobPosting::select('id', 'title')->orderBy('title')->get();

        $query = JobApplication::with('jobPosting');

        if ($jobId) {
            $query->where('job_posting_id', $jobId);
        }

        // Mark all matches as seen so the notification counter resets
        // Safe check to prevent 500 error if migration hasn't run on live server yet
        if (\Illuminate\Support\Facades\Schema::hasColumn('job_applications', 'is_seen')) {
            $query->clone()->where('is_seen', false)->update(['is_seen' => true]);
        }

        $applications = $query->latest()->paginate(15)->withQueryString();

        return view('admin.job-applications.index', compact('applications', 'jobs', 'jobId'));
    }

    public function show($id)
    {
        $application = JobApplication::with('jobPosting')->findOrFail($id);

        // Mark as reviewed and seen if it was pending
        if ($application->status === 'pending') {
            $application->update([
                'status' => 'reviewed',
                'is_seen' => true
            ]);
        }

        return view('admin.job-applications.show', compact('application'));
    }

    public function destroy($id)
    {
        $application = JobApplication::findOrFail($id);

        // Optionally delete the file from storage
        // Since it's 'storage/resumes/...', we need to check if we want to delete it.
        // For now just delete record.

        $application->delete();
        return redirect()->route('admin.job-applications.index')->with('success', 'Application deleted successfully.');
    }


    public function download($id)
    {
        // Use Query Builder directly to ensure we get the binary data without Model overhead
        $record = \DB::table('job_applications')->where('id', $id)->first();

        if (!$record) {
            abort(404, 'Application not found.');
        }

        // Scenario 1: Binary Data in Database
        if (!empty($record->resume_data)) {
            $mime = $record->resume_mime ?? 'application/pdf';
            $filename = $record->resume_filename ?? 'resume.pdf';
            $disposition = 'inline'; // Browser decides: View PDF, Download DOCX based on mime type

            return response($record->resume_data)
                ->header('Content-Type', $mime)
                ->header('Content-Disposition', "$disposition; filename=\"$filename\"")
                ->header('Cache-Control', 'public, max-age=31536000');
        }

        // Scenario 2: Legacy File Path (Fallback)
        if (!empty($record->resume_path)) {
            $path = str_replace('storage/', '', $record->resume_path);
            if (\Storage::disk('public')->exists($path)) {
                return \Storage::disk('public')->response($path);
            }
        }

        abort(404, 'The CV document could not be located in the database or filesystem.');
    }
}
