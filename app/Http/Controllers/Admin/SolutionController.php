<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Solution;
use Illuminate\Support\Facades\Storage;

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

        return redirect()->back()->with('success', 'Solution added successfully.');
    }

    public function update(Request $request, Solution $solution)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $solution->update($request->all());

        return redirect()->back()->with('success', 'Solution updated successfully.');
    }

    public function destroy(Solution $solution)
    {
        $solution->delete();
        return redirect()->back()->with('success', 'Solution deleted successfully.');
    }
}
