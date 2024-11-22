<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ShippingAddressController extends Controller
{
    public function store(Request $request)
    {
      
        $validator = Validator::make($request->all(), [
            'country' => 'required|string|max:255',
            'fullName' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phoneNumber' => 'required|string|max:15',
            'streetAddress' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'postalCode' => 'required|string|max:20',
            'shippingCost' => 'required|numeric|min:0',
            'selectedProducts' => 'required|array',
            'selectedProducts.*.id' => 'required|integer',
            'selectedProducts.*.name' => 'required|string|max:255',
            'selectedProducts.*.price' => 'required|numeric|min:0',
            'selectedProducts.*.quantity' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        $shippingData = [
            'country' => $request->country,
            'full_name' => $request->fullName,
            'email' => $request->email,
            'phone_number' => $request->phoneNumber,
            'street_address' => $request->streetAddress,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postalCode,
            'shipping_cost' => $request->shippingCost,
        ];

        $shippingId = \DB::table('shipping_addresses')->insertGetId($shippingData);

        
        foreach ($request->selectedProducts as $product) {
            \DB::table('shipping_products')->insert([
                'shipping_address_id' => $shippingId,
                'product_id' => $product['id'],
                'name' => $product['name'],
                'price' => $product['price'],
                'quantity' => $product['quantity'],
            ]);
        }

        return response()->json([
            'message' => 'Shipping details saved successfully!',
        ], 201);
    }
}
