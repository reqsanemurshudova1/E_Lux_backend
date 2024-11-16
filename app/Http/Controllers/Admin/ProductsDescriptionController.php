<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\ProductsDescription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsDescriptionController extends Controller
{
    public function index()
    {
        $descriptions = ProductsDescription::with('product')->get();
        return view('admin.products_description.index', compact('descriptions'));
    }

    public function create()
    {
        $products = Product::all();
        return view('admin.products_description.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'origin' => 'required|string|max:255',
            'material' => 'required|string|max:255',
            'care_instructions' => 'required|string|max:255',
            'product_id' => 'required|exists:products,id',
        ]);

        ProductsDescription::create($request->all());

        return redirect()->route('admin.products_description.index')->with('success', 'Product description added successfully.');
    }

    public function edit($id)
    {
        $description = ProductsDescription::findOrFail($id);
        $products = Product::all();
        return view('admin.products_description.edit', compact('description', 'products'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'origin' => 'required|string|max:255',
            'material' => 'required|string|max:255',
            'care_instructions' => 'required|string',
            'product_id' => 'required|exists:products,id',
        ]);

        $description = ProductsDescription::findOrFail($id);
        $description->update($request->all());

        return redirect()->route('admin.products_description.index')->with('success', 'Product description updated successfully.');
    }

    public function destroy($id)
    {
        $description = ProductsDescription::findOrFail($id);
        $description->delete();

        return redirect()->route('admin.products_description.index')->with('success', 'Product description deleted successfully.');
    }
}
