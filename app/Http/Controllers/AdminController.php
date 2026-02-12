<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class AdminController extends Controller
{
    public function index()
    {
        // Monthly Blog Posts (Current Year)
        $blogChartData = \App\Models\BlogPost::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month')
            ->toArray();

        // Monthly Leads (Current Year)
        $leadChartData = \App\Models\Lead::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month')
            ->toArray();

        // Vacancy Stats
        $vacancyChartData = [
            'open' => \App\Models\JobPosting::where('is_active', true)->count(),
            'closed' => \App\Models\JobPosting::where('is_active', false)->count(),
        ];

        // Service Distribution
        $serviceChartData = \App\Models\Lead::selectRaw('service, COUNT(*) as count')
            ->whereNotNull('service')
            ->groupBy('service')
            ->pluck('count', 'service')
            ->toArray();

        // Fill missing months with 0
        $blogData = [];
        $leadData = [];
        for ($i = 1; $i <= 12; $i++) {
            $blogData[] = $blogChartData[$i] ?? 0;
            $leadData[] = $leadChartData[$i] ?? 0;
        }

        // Count Variables for Stats
        $blogCount = \App\Models\BlogPost::count();
        $vacancyCount = \App\Models\JobPosting::count();
        $leadCount = \App\Models\Lead::count();
        $industryCount = \App\Models\Industry::count();

        return view('admin.dashboard', compact(
            'blogData',
            'leadData',
            'vacancyChartData',
            'serviceChartData',
            'blogCount',
            'vacancyCount',
            'leadCount',
            'industryCount'
        ));
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
