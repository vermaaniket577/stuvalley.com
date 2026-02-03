<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PricingPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

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
            'features' => 'nullable|array',
            'features.*' => 'nullable|string',
            'button_text' => 'nullable|string',
            'button_link' => 'nullable|string',
            'sort_order' => 'integer',
        ]);

        // Ensure checkboxes are booleans
        $data['is_popular'] = $request->has('is_popular');
        $data['is_light'] = $request->has('is_light');

        PricingPlan::create($data);
        Cache::forget('home_pricing');
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
    public function edit(PricingPlan $pricing)
    {
        return view('admin.pricing.edit', ['plan' => $pricing]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PricingPlan $pricing)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'currency' => 'nullable|string|max:10',
            'tag_text' => 'nullable|string|max:255',
            'features' => 'nullable|array',
            'features.*' => 'nullable|string',
            'button_text' => 'nullable|string',
            'button_link' => 'nullable|string',
            'sort_order' => 'integer',
        ]);

        // For update, the boolean checkbox absent might not be sent.
        // We need manually handle if not processing all fields.
        // But validate returns only validated data.
        $data['is_popular'] = $request->has('is_popular');
        $data['is_light'] = $request->has('is_light');

        $pricing->update($data);
        Cache::forget('home_pricing');
        return redirect()->route('admin.pricing.index')->with('success', 'Plan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PricingPlan $pricing)
    {
        $pricing->delete();
        Cache::forget('home_pricing');
        return redirect()->route('admin.pricing.index')->with('success', 'Plan deleted successfully.');
    }
}
