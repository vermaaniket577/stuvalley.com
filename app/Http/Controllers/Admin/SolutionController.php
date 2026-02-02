<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Solution;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;

class SolutionController extends Controller
{
    public function index()
    {
        $solutions = Solution::all();
        return view('admin.solutions.index', compact('solutions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required', // Allowing URL or file
        ]);

        $data = $request->all();
        // Here assuming image might be URL since we are prototyping, 
        // real app might upload file. We will keep it simple.

        Solution::create($data);
        Cache::forget('home_solutions');

        return redirect()->back()->with('success', 'Solution added successfully.');
    }

    public function update(Request $request, Solution $solution)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $solution->update($request->all());
        Cache::forget('home_solutions');

        return redirect()->back()->with('success', 'Solution updated successfully.');
    }

    public function destroy(Solution $solution)
    {
        $solution->delete();
        Cache::forget('home_solutions');
        return redirect()->back()->with('success', 'Solution deleted successfully.');
    }
}
