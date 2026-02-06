<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SocialLink;

class SocialLinkController extends Controller
{
    public function index()
    {
        $socialLinks = SocialLink::all();
        return view('admin.social_links.index', compact('socialLinks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'platform' => 'required',
            'url' => 'required|url',
        ]);

        SocialLink::create($request->all());
        \Illuminate\Support\Facades\Cache::forget('global_social_links');
        return redirect()->back()->with('success', 'Social Link added successfully.');
    }

    public function update(Request $request, SocialLink $socialLink)
    {
        $request->validate([
            'platform' => 'required',
            'url' => 'required|url',
        ]);

        $socialLink->update($request->all());
        \Illuminate\Support\Facades\Cache::forget('global_social_links');
        return redirect()->back()->with('success', 'Social Link updated successfully.');
    }

    public function destroy(SocialLink $socialLink)
    {
        $socialLink->delete();
        \Illuminate\Support\Facades\Cache::forget('global_social_links');
        return redirect()->back()->with('success', 'Social Link deleted successfully.');
    }
}
