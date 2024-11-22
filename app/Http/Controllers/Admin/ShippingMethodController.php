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
        ]);

        ShippingMethod::create($request->all());

        // Redirect with correct route name
        return redirect()->route('admin.shipping.index')->with('success', 'Shipping method created successfully.');
    }

    public function edit($id)
    {
        $shippingMethod = ShippingMethod::findOrFail($id);
        return view('admin.shipping.edit', compact('shippingMethod')); // edit view
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
        ]);

        $shippingMethod = ShippingMethod::findOrFail($id);
        $shippingMethod->update($request->all());

       
        return redirect()->route('admin.shipping.index')->with('success', 'Shipping method updated successfully.');
    }

    public function destroy($id)
    {
        $shippingMethod = ShippingMethod::findOrFail($id);
        $shippingMethod->delete();

        // Redirect with correct route name
        return redirect()->route('admin.shipping.index')->with('success', 'Shipping method deleted successfully.');
    }
}
