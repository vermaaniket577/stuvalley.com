<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobPosting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CareerController extends Controller
{
    public function index()
    {
        $jobs = JobPosting::where('slug', '!=', 'open-application')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('admin.careers.index', compact('jobs'));
    }

    public function create()
    {
        return view('admin.careers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'department' => 'nullable|string|max:255',
            'location' => 'required|string|max:255',
            'job_type' => 'required|in:Full-time,Part-time,Contract,Internship',
            'experience_level' => 'required|in:Entry Level,Mid Level,Senior Level,Lead/Manager',
            'description' => 'required',
            'responsibilities' => 'nullable|string',
            'requirements' => 'nullable|string',
            'benefits' => 'nullable|string',
            'salary_range' => 'nullable|string|max:255',
            'positions' => 'required|integer|min:1',
            'application_deadline' => 'nullable|date',
            'is_active' => 'boolean'
        ]);

        $validated['slug'] = Str::slug($request->title) . '-' . time();
        $validated['is_active'] = $request->has('is_active');

        JobPosting::create($validated);

        return redirect()->route('admin.careers.index')->with('success', 'Job posting created successfully!');
    }

    public function edit(JobPosting $career)
    {
        return view('admin.careers.create', ['job' => $career]);
    }

    public function update(Request $request, JobPosting $career)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'department' => 'nullable|string|max:255',
            'location' => 'required|string|max:255',
            'job_type' => 'required|in:Full-time,Part-time,Contract,Internship',
            'experience_level' => 'required|in:Entry Level,Mid Level,Senior Level,Lead/Manager',
            'description' => 'required',
            'responsibilities' => 'nullable|string',
            'requirements' => 'nullable|string',
            'benefits' => 'nullable|string',
            'salary_range' => 'nullable|string|max:255',
            'positions' => 'required|integer|min:1',
            'application_deadline' => 'nullable|date',
            'is_active' => 'boolean'
        ]);

        $validated['is_active'] = $request->has('is_active');

        $career->update($validated);

        return redirect()->route('admin.careers.index')->with('success', 'Job posting updated successfully!');
    }

    public function destroy(JobPosting $career)
    {
        $career->delete();
        return redirect()->route('admin.careers.index')->with('success', 'Job posting deleted successfully!');
    }
}
