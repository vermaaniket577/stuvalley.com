<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BlogPost extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'featured_image',
        'author',
        'category',
        'tags',
        'reading_time',
        'is_published',
        'published_at',
        'views'
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    // Auto-generate slug from title
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title);
            }
        });
    }

    // Scope for published posts
    public function scopePublished($query)
    {
        return $query->where('is_published', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }

    // Increment view count
    public function incrementViews()
    {
        $this->increment('views');
    }

    /**
     * Get the full URL for the featured image
     */
    public function getFeaturedImageUrlAttribute()
    {
        if (!$this->featured_image) {
            return 'https://images.unsplash.com/photo-1526778548025-fa2f459cd5c1?w=1200';
        }

        // Check for Base64 (Legacy support)
        if (Str::startsWith($this->featured_image, 'data:')) {
            return $this->featured_image;
        }

        // Check for External URL
        if (filter_var($this->featured_image, FILTER_VALIDATE_URL)) {
            return $this->featured_image;
        }

        // For files in public directory (images/blog/filename.jpg)
        // or old storage paths (blog/filename.jpg)
        if (Str::startsWith($this->featured_image, 'images/')) {
            // FIX: Explicitly prepend 'public/' because the web server root is strictly the app root
            return asset('public/' . $this->featured_image);
        }

        // Legacy: storage path (also needs public/)
        return asset('public/storage/' . $this->featured_image);
    }
}
