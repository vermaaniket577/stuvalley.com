<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $fillable = [
        'name',
        'role',
        'image',
        'linkedin_url',
        'twitter_url',
        'sort_order',
        'is_active'
    ];
}
