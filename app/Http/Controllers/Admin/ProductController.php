<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of products
     */
    public function index()
    {
        $products = Product::orderBy('sort_order')->orderBy('created_at', 'desc')->get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new product
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created product
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:products,slug',
            'category' => 'required|string|max:255',
            'short_description' => 'required|string',
            'full_description' => 'required|string',
            'value_proposition' => 'nullable|string',
            'banner_image' => 'nullable|image|max:2048',
            'featured_image' => 'nullable|image|max:2048',
            'industry' => 'nullable|string|max:255',
            'demo_url' => 'nullable|url',
            'icon' => 'nullable|string|max:255',
            'color_scheme' => 'nullable|string|max:7',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
        ]);

        // Auto-generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Handle file uploads
        if ($request->hasFile('banner_image')) {
            $validated['banner_image'] = $request->file('banner_image')->store('products/banners', 'public');
        }

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('products/featured', 'public');
        }

        // Handle JSON fields
        $validated['features'] = $request->input('features') ? json_decode($request->input('features'), true) : [];
        $validated['tech_stack'] = $request->input('tech_stack') ? explode(',', $request->input('tech_stack')) : [];
        $validated['gallery'] = $request->input('gallery') ? json_decode($request->input('gallery'), true) : [];

        Product::create($validated);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully!');
    }

    /**
     * Show the form for editing the specified product
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified product
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:products,slug,' . $product->id,
            'category' => 'required|string|max:255',
            'short_description' => 'required|string',
            'full_description' => 'required|string',
            'value_proposition' => 'nullable|string',
            'banner_image' => 'nullable|image|max:2048',
            'featured_image' => 'nullable|image|max:2048',
            'industry' => 'nullable|string|max:255',
            'demo_url' => 'nullable|url',
            'icon' => 'nullable|string|max:255',
            'color_scheme' => 'nullable|string|max:7',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
        ]);

        // Handle file uploads
        if ($request->hasFile('banner_image')) {
            $validated['banner_image'] = $request->file('banner_image')->store('products/banners', 'public');
        }

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('products/featured', 'public');
        }

        // Handle JSON fields
        if ($request->has('features')) {
            $validated['features'] = json_decode($request->input('features'), true);
        }
        if ($request->has('tech_stack')) {
            $validated['tech_stack'] = explode(',', $request->input('tech_stack'));
        }
        if ($request->has('gallery')) {
            $validated['gallery'] = json_decode($request->input('gallery'), true);
        }

        $product->update($validated);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified product
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully!');
    }
}
