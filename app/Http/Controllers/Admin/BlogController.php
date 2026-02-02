<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of blog posts (Admin)
     */
    public function index()
    {
        $posts = BlogPost::latest()->paginate(15);
        return view('admin.blog.index', compact('posts'));
    }

    /**
     * Show the form for creating a new blog post
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created blog post
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'excerpt' => 'nullable',
            'content' => 'required',
            'featured_image' => 'nullable|url',
            'author' => 'nullable|max:100',
            'category' => 'nullable|max:50',
            'tags' => 'nullable|max:255',
            'reading_time' => 'nullable|integer|min:1',
            'is_published' => 'boolean',
        ]);

        // Auto-generate slug
        $validated['slug'] = Str::slug($validated['title']);

        // Set published_at if publishing
        if ($request->is_published) {
            $validated['published_at'] = now();
        }

        BlogPost::create($validated);

        return redirect()->route('admin.blog.index')
            ->with('success', 'Blog post created successfully!');
    }

    /**
     * Display the specified blog post
     */
    public function show(BlogPost $blog)
    {
        return view('admin.blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified blog post
     */
    public function edit(BlogPost $blog)
    {
        return view('admin.blog.create', compact('blog'));
    }

    /**
     * Update the specified blog post
     */
    public function update(Request $request, BlogPost $blog)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'excerpt' => 'nullable',
            'content' => 'required',
            'featured_image' => 'nullable|url',
            'author' => 'nullable|max:100',
            'category' => 'nullable|max:50',
            'tags' => 'nullable|max:255',
            'reading_time' => 'nullable|integer|min:1',
            'is_published' => 'boolean',
        ]);

        // Update slug if title changed
        if ($blog->title !== $validated['title']) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Set published_at if publishing for first time
        if ($request->is_published && !$blog->is_published) {
            $validated['published_at'] = now();
        }

        $blog->update($validated);

        return redirect()->route('admin.blog.index')
            ->with('success', 'Blog post updated successfully!');
    }

    /**
     * Remove the specified blog post
     */
    public function destroy(BlogPost $blog)
    {
        $blog->delete();

        return redirect()->route('admin.blog.index')
            ->with('success', 'Blog post deleted successfully!');
    }
}
