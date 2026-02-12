<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'short_description',
        'full_description',
        'value_proposition',
        'banner_image',
        'featured_image',
        'features',
        'tech_stack',
        'gallery',
        'industry',
        'demo_url',
        'icon',
        'color_scheme',
        'sort_order',
        'is_active',
        'is_featured',
        'views',
    ];

    protected $casts = [
        'features' => 'array',
        'tech_stack' => 'array',
        'gallery' => 'array',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'views' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->title);
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('created_at', 'desc');
    }

    public function getBannerImageUrlAttribute()
    {
        if (empty($this->banner_image)) {
            return 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=1600&auto=format&fit=crop';
        }

        if (filter_var($this->banner_image, FILTER_VALIDATE_URL)) {
            return $this->banner_image;
        }

        return asset('storage/' . $this->banner_image);
    }

    public function getFeaturedImageUrlAttribute()
    {
        if (empty($this->featured_image)) {
            return 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=800&auto=format&fit=crop';
        }

        if (filter_var($this->featured_image, FILTER_VALIDATE_URL)) {
            return $this->featured_image;
        }

        return asset('storage/' . $this->featured_image);
    }

    public function getCategoryColorAttribute()
    {
        $colors = [
            'E-Commerce' => '#3b82f6',
            'Corporate' => '#8b5cf6',
            'FinTech' => '#10b981',
            'EdTech' => '#f59e0b',
            'Healthcare' => '#ef4444',
            'SaaS' => '#06b6d4',
        ];

        return $colors[$this->category] ?? '#3b82f6';
    }

    public function getUrlAttribute()
    {
        return route('products.show', $this->slug);
    }

    public function incrementViews()
    {
        $this->increment('views');
    }
}