<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeoPage extends Model
{
    protected $fillable = ['page_identifier', 'title', 'description', 'keywords', 'image'];
}
