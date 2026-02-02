<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class JobPosting extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'department',
        'location',
        'job_type',
        'experience_level',
        'description',
        'responsibilities',
        'requirements',
        'benefits',
        'salary_range',
        'is_active',
        'positions',
        'application_deadline'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'application_deadline' => 'date',
    ];

    // Auto-generate slug from title
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($job) {
            if (empty($job->slug)) {
                $job->slug = Str::slug($job->title);
            }
        });
    }

    // Scope for active jobs
    public function scopeActive($query)
    {
        return $query->where('is_active', true)
            ->where(function ($q) {
                $q->whereNull('application_deadline')
                    ->orWhere('application_deadline', '>=', now());
            });
    }
}
