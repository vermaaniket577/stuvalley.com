<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PricingPlan extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $fillable = [
        'title',
        'price',
        'currency',
        'tag_text',
        'is_popular',
        'is_light',
        'features',
        'button_text',
        'button_link',
        'sort_order',
    ];

    protected $casts = [
        'features' => 'array',
        'is_popular' => 'boolean',
        'is_light' => 'boolean',
    ];
}
