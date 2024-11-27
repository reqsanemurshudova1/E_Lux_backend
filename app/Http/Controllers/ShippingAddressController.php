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
            'selectedProducts.*.product_name' => 'required|string|max:255',
            'selectedProducts.*.product_price' => 'required|numeric|min:0',
            'selectedProducts.*.quantity' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        $shippingData = $request->only([
            'country',
            'fullName',
            'email',
            'phoneNumber',
            'streetAddress',
            'city',
            'state',
            'postalCode',
            'shippingCost',
        ]);
        //$shippingData['full_name'] = $shippingData['fullName']; // Adjusted for database

        $shippingId = \DB::table('shipping_addresses')->insertGetId($shippingData);

        foreach ($request->selectedProducts as $product) {
            \DB::table('shipping_products')->insert([
                'shipping_address_id' => $shippingId,
                'product_id' => $product['id'],
                'fullName' => $product['product_name'],
                'price' => $product['product_price'],
                'quantity' => $product['quantity'],
            ]);
        }

        return response()->json([
            'message' => 'Shipping details saved successfully!',
        ], 201);
    }
}
