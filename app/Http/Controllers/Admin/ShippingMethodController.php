<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShippingMethod;
use Illuminate\Http\Request;

class ShippingMethodController extends Controller
{
    public function index()
    {
        $shippingMethods = ShippingMethod::all();
        return view('admin.shipping.index', compact('shippingMethods')); 
    }

    public function create()
    {
        return view('admin.shipping.create'); 
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'delivery_time' => 'nullable|string',
            'restrictions' => 'nullable|string',
            'carrier' => 'nullable|string',
            'min_amount' => 'nullable|numeric|min:0',
            'max_amount' => 'nullable|numeric|min:0',
            'additional_charges' => 'nullable|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $data = $request->all();
        //dd($data);

        if ($request->hasFile('image')) {

            $imagePath = $request->file('image')->store('shipping_methods', 'public');
            $data['image'] = $imagePath;
        }

        ShippingMethod::create($data);

        return redirect()->route('admin.shipping.index')->with('success', 'Shipping method created successfully.');
    }


    public function edit($id)
    {
        $shippingMethod = ShippingMethod::findOrFail($id);
        return view('admin.shipping.edit', compact('shippingMethod'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'delivery_time' => 'nullable|string',
            'restrictions' => 'nullable|string',
            'carrier' => 'nullable|string',
            'min_amount' => 'nullable|numeric|min:0',
            'max_amount' => 'nullable|numeric|min:0',
            'additional_charges' => 'nullable|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $shippingMethod = ShippingMethod::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('image')) {

            if ($shippingMethod->image) {
                \Storage::delete('public/' . $shippingMethod->image);
            }

            $imagePath = $request->file('image')->store('photos', 'public');
            $data['image'] = $imagePath;
        }

        $shippingMethod->update($data);

       
        return redirect()->route('admin.shipping.index')->with('success', 'Shipping method updated successfully.');
    }


    public function destroy($id)
    {
        $shippingMethod = ShippingMethod::findOrFail($id);


        if ($shippingMethod->image) {
            \Storage::delete('public/' . $shippingMethod->image);
        }

        $shippingMethod->delete();

        return redirect()->route('admin.shipping.index')->with('success', 'Shipping method deleted successfully.');
    }
}
