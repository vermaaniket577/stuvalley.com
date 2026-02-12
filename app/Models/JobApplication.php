<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    protected $fillable = [
        'job_posting_id',
        'full_name',
        'email',
        'phone',
        'resume_path',
        'resume_data',
        'resume_filename',
        'resume_mime',
        'resume_size',
        'cover_letter',
        'status',
        'is_seen'
    ];

    public function jobPosting()
    {
        return $this->belongsTo(JobPosting::class);
    }
}
