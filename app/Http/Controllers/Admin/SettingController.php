<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->groupBy('group');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->except('_token', '_method');

        // Handle file uploads
        if ($request->hasFile('site_logo')) {
            $path = $request->file('site_logo')->store('settings', 'public');
            Setting::set('site_logo', $path, 'image');
            unset($data['site_logo']);
        }

        foreach ($data as $key => $value) {
            // Handle multiple inputs (arrays) by encoding to JSON
            if (is_array($value)) {
                $value = json_encode($value);
            }

            Setting::where('key', $key)->update(['value' => $value]);
        }

        // Clear settings cache
        \Illuminate\Support\Facades\Cache::forget('global_settings');

        return redirect()->route('admin.settings.index')->with('success', 'Settings updated successfully.');
    }
}
