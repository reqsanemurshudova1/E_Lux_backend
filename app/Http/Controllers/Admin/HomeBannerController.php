<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeBannerController extends Controller
{
    public function index()
    {
        $banners = HomeBanner::all();
        return view('admin.home_banners.index', compact('banners'));
    }

    public function create()
    {
        $banner = HomeBanner::first();
        if ($banner) {
            return redirect()->route('admin.home_banners.edit', $banner->id);
        }
        return view('admin.home_banners.create');
    }

    public function store(Request $request)
    {
        if (HomeBanner::count() >= 1) {
            return redirect()->back()->withErrors(['error' => 'Only one banner can be added.'])->withInput();
        }

        // Validation
        $request->validate([
            'header' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'style_count' => 'required|string',
            'brand_count' => 'required|string',
            'footer_info' => 'required|string',
            'img' => 'required|image|max:1000000',
        ]);

        // Image upload
        $imgPath = $request->file('img')->store('home_banners', 'public');

        // Create banner
        HomeBanner::create([
            'header' => $request->header,
            'description' => $request->description,
            'style_count' => $request->style_count,
            'brand_count' => $request->brand_count,
            'footer_info' => $request->footer_info,
            'img' => $imgPath,
        ]);

        return redirect()->route('admin.home_banners.index')->with('success', 'Banner added successfully.');
    }

    public function edit($id)
    {
        $banner = HomeBanner::findOrFail($id);
        return view('admin.home_banners.edit', compact('banner'));
    }

    public function update(Request $request, $id)
    {
        // Validation
        $request->validate([
            'header' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'style_count' => 'nullable|string',
            'brand_count' => 'nullable|string',
            'footer_info' => 'nullable|string',
            'img' => 'nullable|image|max:2048',
        ]);

        $banner = HomeBanner::findOrFail($id);

        if ($request->hasFile('img')) {
            if ($banner->img) {
                Storage::disk('public')->delete($banner->img);
            }
            $imgPath = $request->file('img')->store('home_banners', 'public');
            $banner->img = $imgPath;
        }

        $banner->header = $request->header;
        $banner->description = $request->description;
        $banner->style_count = $request->style_count;
        $banner->brand_count = $request->brand_count;
        $banner->footer_info = $request->footer_info;
        $banner->save();

        return redirect()->route('admin.home_banners.index')->with('success', 'Banner updated successfully.');
    }

    public function destroy($id)
    {
        $banner = HomeBanner::findOrFail($id);
        if ($banner->img) {
            Storage::disk('public')->delete($banner->img);
        }
        $banner->delete();
        return redirect()->route('admin.home_banners.index')->with('success', 'Banner deleted successfully.');
    }

    public function getBanners()
    {
        $banners = HomeBanner::all();
        return response()->json([
            'status' => 'success',
            'data' => $banners
        ], 200);
    }
}
