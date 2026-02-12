<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of all products (card grid)
     */
    public function index()
    {
        $products = Product::active()
            ->ordered()
            ->get();

        return view('products.index', compact('products'));
    }

    /**
     * Display the specified product detail page
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        // Increment view count
        $product->incrementViews();

        // Get related products (same category, excluding current)
        $relatedProducts = Product::active()
            ->where('category', $product->category)
            ->where('id', '!=', $product->id)
            ->ordered()
            ->limit(3)
            ->get();

        return view('products.show', compact('product', 'relatedProducts'));
    }

    /**
     * Filter products by category
     */
    public function category($category)
    {
        $products = Product::active()
            ->where('category', $category)
            ->ordered()
            ->get();

        return view('products.index', compact('products', 'category'));
    }
}
