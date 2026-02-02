<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndustryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $industries = \App\Models\Industry::orderBy('sort_order')->paginate(10);
        return view('admin.industries.index', compact('industries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.industries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'sort_order' => 'integer|min:0',
            'is_active' => 'boolean',
        ]);

        \App\Models\Industry::create($validated);

        return redirect()->route('admin.industries.index')->with('success', 'Industry created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $industry = \App\Models\Industry::findOrFail($id);
        return view('admin.industries.edit', compact('industry'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'sort_order' => 'integer|min:0',
            'is_active' => 'boolean',
        ]);

        $industry = \App\Models\Industry::findOrFail($id);
        $industry->update($validated);

        return redirect()->route('admin.industries.index')->with('success', 'Industry updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $industry = \App\Models\Industry::findOrFail($id);
        $industry->delete();

        return redirect()->route('admin.industries.index')->with('success', 'Industry deleted successfully.');
    }
}
