<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function settings()
    {
        $settings = Setting::all()->pluck('value', 'key');
        return view('admin.settings', compact('settings'));
    }

    public function whatsapp()
    {
        return view('admin.whatsapp');
    }

    public function updateSettings(Request $request)
    {
        $data = $request->except('_token');

        foreach ($data as $key => $value) {
            $type = 'text';

            if ($request->hasFile($key)) {
                $value = $request->file($key)->store('settings', 'public');
                $type = 'image';
            } elseif (is_array($value)) {
                $value = json_encode(array_filter($value)); // Filter out empty values
                $type = 'json';
            }

            // Determine group based on key prefix or predefined list
            $group = 'general';
            if (str_starts_with($key, 'seo_'))
                $group = 'seo';
            if (str_starts_with($key, 'social_'))
                $group = 'social';

            Setting::set($key, $value, $type, $group);
        }

        // Clear Cache to reflect changes immediately
        \Illuminate\Support\Facades\Cache::forget('global_settings');

        return redirect()->back()->with('success', 'Settings updated successfully.');
    }
}
