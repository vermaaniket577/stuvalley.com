<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'message' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('testimonials', 'public');
            $data['image'] = $path;
        }

        Testimonial::create($data);
        return redirect()->back()->with('success', 'Testimonial added successfully.');
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'message' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($testimonial->image) {
                Storage::disk('public')->delete($testimonial->image);
            }
            $path = $request->file('image')->store('testimonials', 'public');
            $data['image'] = $path;
        }

        $testimonial->update($data);
        return redirect()->back()->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->image) {
            Storage::disk('public')->delete($testimonial->image);
        }
        $testimonial->delete();
        return redirect()->back()->with('success', 'Testimonial deleted successfully.');
    }
}
