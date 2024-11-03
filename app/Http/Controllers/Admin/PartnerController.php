<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::all();
        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(Request $request)
    {
        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            $imgPath = $request->file('img')->store('partners', 'public');
        } else {
            return back()->withErrors(['img' => 'Error']);
        }

        Partner::create([
            'img' => $imgPath,
            'title' => $request->input('title'),
        ]);

        return redirect()->route('admin.partners.index')->with('success', 'Partner added successfully.');
    }

    public function edit($id)
    {
        $partner = Partner::findOrFail($id);
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
        ]);

        $partner = Partner::findOrFail($id);

        if ($request->hasFile('img')) {
            if ($partner->img) {
                Storage::disk('public')->delete($partner->img);
            }
            $imagePath = $request->file('img')->store('partners', 'public');
            $partner->img = $imagePath;
        }

        $partner->title = $request->title;
        $partner->save();

        return redirect()->route('admin.partners.index')->with('success', 'Partner updated successfully.');
    }

    public function destroy($id)
    {
        $partner = Partner::findOrFail($id);

        if ($partner->img) {
            Storage::disk('public')->delete($partner->img);
        }

        $partner->delete();
        return redirect()->route('admin.partners.index')->with('success', 'Partner deleted successfully.');
    }

//    Public Api


    public function getPartners()
    {
        $partners = Partner::all();
        return response()->json([
            'status' => 'success',
            'data' => $partners
        ], 200);
    }
}
