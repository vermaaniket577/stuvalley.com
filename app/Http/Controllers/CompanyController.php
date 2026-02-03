<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function about()
    {
        $members = \App\Models\TeamMember::where('is_active', true)->orderBy('sort_order')->get();
        return view('company.about', compact('members'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function careers()
    {
        $openings = \App\Models\JobPosting::active()->orderBy('created_at', 'desc')->get();
        return view('company.careers', compact('openings'));
    }

    public function blog()
    {
        return view('company.blog.index');
    }

    public function privacy()
    {
        return view('company.privacy');
    }

    public function terms()
    {
        return view('company.terms');
    }
}
