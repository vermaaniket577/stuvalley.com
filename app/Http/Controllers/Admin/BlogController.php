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
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:500',
            'author' => 'nullable|max:100',
            'category' => 'nullable|max:50',
            'tags' => 'nullable|max:255',
            'reading_time' => 'nullable|integer|min:1',
        ]);

        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('featured-images', 'public');
            $validated['featured_image'] = $path;
        }

        $validated['is_published'] = $request->boolean('is_published');

        // Generate Unique Slug
        $slug = Str::slug($validated['title']);
        $originalSlug = $slug;
        $count = 1;
        while (BlogPost::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-{$count}";
            $count++;
        }
        $validated['slug'] = $slug;

        if ($validated['is_published']) {
            $validated['published_at'] = now();
        }

        $post = BlogPost::create($validated);

        // Determine response based on publish status
        if ($validated['is_published']) {
            $message = '🎉 Success! Your blog post has been published and is now live on the website.';
            $status = 'published';
        } else {
            $message = '📝 Draft Saved! Your blog post has been saved as a draft. You can publish it anytime from the blog list.';
            $status = 'draft';
        }

        // Return JSON for AJAX or redirect for traditional form
        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'status' => $status,
                'message' => $message,
                'post' => [
                    'id' => $post->id,
                    'title' => $post->title,
                    'slug' => $post->slug,
                ]
            ], 201);
        }

        return redirect()->route('admin.blog.index')
            ->with('success', $message)
            ->with('status', $status);
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
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:500',
            'author' => 'nullable|max:100',
            'category' => 'nullable|max:50',
            'tags' => 'nullable|max:255',
            'reading_time' => 'nullable|integer|min:1',
        ]);

        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('featured-images', 'public');
            $validated['featured_image'] = $path;
        } else {
            // Keep the old image if no new one is uploaded
            unset($validated['featured_image']);
        }

        $validated['is_published'] = $request->boolean('is_published');

        // Update slug if title changed
        if ($blog->title !== $validated['title']) {
            $slug = Str::slug($validated['title']);
            $originalSlug = $slug;
            $count = 1;
            while (BlogPost::where('slug', $slug)->where('id', '!=', $blog->id)->exists()) {
                $slug = "{$originalSlug}-{$count}";
                $count++;
            }
            $validated['slug'] = $slug;
        }

        // Set published_at if publishing for first time
        if ($validated['is_published'] && !$blog->is_published) {
            $validated['published_at'] = now();
        }

        $blog->update($validated);

        // Determine response based on publish status
        if ($validated['is_published']) {
            $message = '✅ Updated! Your changes have been published and are now live on the website.';
            $status = 'published';
        } else {
            $message = '📝 Draft Updated! Your changes have been saved. The post remains in draft mode.';
            $status = 'draft';
        }

        // Return JSON for AJAX or redirect for traditional form
        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'status' => $status,
                'message' => $message,
                'post' => [
                    'id' => $blog->id,
                    'title' => $blog->title,
                    'slug' => $blog->slug,
                ]
            ]);
        }

        return redirect()->route('admin.blog.index')
            ->with('success', $message)
            ->with('status', $status);
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
