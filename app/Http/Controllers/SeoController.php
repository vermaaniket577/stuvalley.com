<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SeoPage;

class SeoController extends Controller
{
    public function index()
    {
        // Pre-defined list of pages users can edit SEO for
        $pages = [
            'home' => 'Home Page',
            'about' => 'About Page',
            'services' => 'Services (Main)',
            'contact' => 'Contact Page',
            'services-web' => 'Service: Web Development',
            'services-mobile' => 'Service: Mobile Apps',
            'services-marketing' => 'Service: Digital Marketing'
        ];

        // Load existing SEO data
        $seoData = SeoPage::all()->keyBy('page_identifier');

        return view('admin.seo.index', compact('pages', 'seoData'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'page_identifier' => 'required',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'keywords' => 'nullable|string',
            'image' => 'nullable|image|max:2048'
        ]);

        $seo = SeoPage::firstOrNew(['page_identifier' => $data['page_identifier']]);

        $seo->title = $data['title'];
        $seo->description = $data['description'];
        $seo->keywords = $data['keywords'];

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('seo', 'public');
            $seo->image = $path;
        }

        $seo->save();

        return redirect()->back()->with('success', 'SEO settings for ' . $data['page_identifier'] . ' updated!');
    }

    // API endpoint to fetch data when dropdown changes
    public function getData($page)
    {
        $seo = SeoPage::where('page_identifier', $page)->first();
        return response()->json($seo ?? []);
    }
}
