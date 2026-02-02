<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::orderBy('sort_order')->get();
        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'nullable|url',
        ]);

        $path = $request->file('logo')->store('partners', 'public');

        Partner::create([
            'name' => $request->name,
            'logo' => $path,
            'link' => $request->link,
            'sort_order' => $request->sort_order ?? 0,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.partners.index')->with('success', 'Partner added successfully.');
    }

    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'name' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'nullable|url',
        ]);

        $data = [
            'name' => $request->name,
            'link' => $request->link,
            'sort_order' => $request->sort_order ?? 0,
            'is_active' => $request->has('is_active'),
        ];

        if ($request->hasFile('logo')) {
            // Delete old
            if ($partner->logo) {
                Storage::disk('public')->delete($partner->logo);
            }
            $data['logo'] = $request->file('logo')->store('partners', 'public');
        }

        $partner->update($data);

        return redirect()->route('admin.partners.index')->with('success', 'Partner updated successfully.');
    }

    public function destroy(Partner $partner)
    {
        if ($partner->logo) {
            Storage::disk('public')->delete($partner->logo);
        }
        $partner->delete();
        return redirect()->route('admin.partners.index')->with('success', 'Partner deleted successfully.');
    }
}
