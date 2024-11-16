<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;


class ProductReviewController extends Controller
{

    public function index()
    {
        $reviews = ProductReview::all();
        return view('admin.product_reviews.index', compact('reviews'));
    }

  public function create()
    {
        $products = Product::all();
        return view('admin.product_reviews.create', compact('products'));
    }

    public function store(Request $request)
    {
        // Fotoğrafın doğrulama kuralları ekleniyor
        $validated = $request->validate([
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'profile_name' => 'required|string',
            'comment' => 'required|string',
            'like' => 'nullable|integer',
            'dislike' => 'nullable|integer',
            'time' => 'nullable|date',
            'common_review' => 'nullable|integer',
            'product_id' => 'required|exists:products,id',
        ]);

        // Fotoğraf var mı diye kontrol et
        if ($request->hasFile('profile_photo')) {
            // Fotoğrafı kaydet
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $validated['profile_photo'] = $path; // Yolu kaydediyoruz
        }

        // Yeni inceleme kaydedilir
        ProductReview::create($validated);

        return redirect()->route('admin.product_reviews.index')->with('success', 'Review created successfully.');
    }

    public function edit($id)
    {
        $review = ProductReview::findOrFail($id);
        $products = Product::all();

        return view('admin.product_reviews.edit', compact('review', 'products')); // Ürünleri view'e gönder
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'profile_name' => 'required|string',
            'comment' => 'required|string',
            'like' => 'nullable|integer',
            'dislike' => 'nullable|integer',
            'time' => 'nullable|date',
            'common_review' => 'nullable|integer',
            'product_id' => 'required|exists:products,id',
        ]);

        $review = ProductReview::findOrFail($id);

     if ($request->hasFile('profile_photo')) {
            if ($review->profile_photo) {
                Storage::disk('public')->delete($review->profile_photo);
            }
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $validated['profile_photo'] = $path;
        }

        $review->update($validated);

        return redirect()->route('admin.product_reviews.index')->with('success', 'Review updated successfully.');
    }

    public function destroy($id)
    {
  $review = ProductReview::findOrFail($id);
        $review->delete();
        return redirect()->route('admin.product_reviews.index')->with('success', 'Review deleted successfully.');
    }
}
