<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PricingPlan;
use Illuminate\Http\Request;

class PricingPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plans = PricingPlan::orderBy('sort_order')->get();
        return view('admin.pricing.index', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pricing.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'currency' => 'nullable|string|max:10',
            'tag_text' => 'nullable|string|max:255',
            'is_popular' => 'boolean',
            'is_light' => 'boolean',
            'features' => 'nullable|array',
            'features.*' => 'string', // Simple array of strings for now? Or complex objects?
            // Let's assume we handle complex feature objects (text, active) via JSON or separate inputs logic.
            // For simplicity in form, we might send array of strings. 
            // BUT existing UI has checked/unchecked. 
            // Let's adapt: 'features' => array of ['text' => string, 'active' => bool]
            'button_text' => 'nullable|string',
            'button_link' => 'nullable|string',
            'sort_order' => 'integer',
        ]);

        // Ensure checkboxes are booleans
        $data['is_popular'] = $request->has('is_popular');
        $data['is_light'] = $request->has('is_light');

        PricingPlan::create($data);
        return redirect()->route('admin.pricing.index')->with('success', 'Plan created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PricingPlan $pricingPlan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PricingPlan $pricingPlan)
    {
        return view('admin.pricing.edit', ['plan' => $pricingPlan]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PricingPlan $pricingPlan)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'currency' => 'nullable|string|max:10',
            'tag_text' => 'nullable|string|max:255',
            'is_popular' => 'boolean', // Validation handles '1', 'true', 'on'
            'is_light' => 'boolean',
            'features' => 'nullable|array',
            'features.*' => 'string',
            'button_text' => 'nullable|string',
            'button_link' => 'nullable|string',
            'sort_order' => 'integer',
        ]);

        // For update, the boolean checkbox absent might not be sent.
        // We need manually handle if not processing all fields.
        // But validate returns only validated data.
        $data['is_popular'] = $request->has('is_popular');
        $data['is_light'] = $request->has('is_light');

        $pricingPlan->update($data);
        return redirect()->route('admin.pricing.index')->with('success', 'Plan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PricingPlan $pricingPlan)
    {
        $pricingPlan->delete();
        return redirect()->route('admin.pricing.index')->with('success', 'Plan deleted successfully.');
    }
}
