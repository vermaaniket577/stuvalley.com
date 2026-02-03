<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Facades\Mail;
// use App\Mail\QuoteRequested;
// use App\Mail\QuoteConfirmation;

class QuoteController extends Controller
{
    public function index()
    {
        return view('quote');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'service' => 'required|string',
            'details' => 'required|string',
            'budget' => 'required|string',
            'timeline' => 'required|string',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'file' => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:5120', // 5MB max
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        try {
            $filePath = null;
            if ($request->hasFile('file')) {
                $filePath = $request->file('file')->store('quotes', 'public');
            }

            // Create ID reference (e.g., STU-2026-0001)
            $refId = 'REF-' . strtoupper(uniqid());

            $lead = Lead::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'company' => $request->company,
                'city' => $request->city,
                'service' => $request->service,
                'message' => $request->details, // storing project details in message field
                'budget' => $request->budget,
                'timeline' => $request->timeline,
                'file_path' => $filePath,
                'type' => 'quote',
                'status' => 'new'
            ]);

            // TODO: Send Emails
            // Mail::to($request->email)->send(new QuoteConfirmation($lead));
            // Mail::to(config('mail.admin_address'))->send(new QuoteRequested($lead));

            return response()->json([
                'success' => true,
                'message' => 'Quote request received successfully.',
                'ref_id' => $lead->id // Or formatted ID
            ]);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Something went wrong. Please try again.'], 500);
        }
    }
}
