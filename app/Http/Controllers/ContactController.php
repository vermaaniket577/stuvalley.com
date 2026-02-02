<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'service' => 'required|string|max:255',
            'message' => 'nullable|string|max:1000',
        ]);

        try {
            // Store lead in database
            \App\Models\Lead::create([
                'name' => $validated['full_name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'service' => $validated['service'],
                'message' => $validated['message'] ?? '',
                'status' => 'new'
            ]);

            // Send email notification function call remains here (disabled for now)
            $this->sendContactEmail($validated);

            // Log the contact submission
            Log::info('Lead captured', [
                'name' => $validated['full_name'],
                'email' => $validated['email']
            ]);

            return redirect()->back()->with('success', 'Thank you for contacting us! We will get back to you soon.');
        } catch (\Exception $e) {
            Log::error('Contact form submission failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong. Please try again later.');
        }
    }

    private function sendContactEmail($data)
    {
        // You can configure this to send emails to your admin email
        // For now, we'll just log it
        // Uncomment and configure when you're ready to send emails

        /*
        Mail::send('emails.contact', ['data' => $data], function ($message) use ($data) {
            $message->to(config('mail.admin_email', 'admin@stuvalley.com'))
                    ->subject('New Contact Form Submission - ' . $data['service']);
            $message->from($data['email'], $data['full_name']);
        });
        */
    }
}
