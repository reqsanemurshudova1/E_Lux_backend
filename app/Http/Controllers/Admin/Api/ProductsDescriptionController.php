<?php

namespace App\Http\Controllers\Admin\Api;

use App\Models\Product;
use App\Models\ProductsDescription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsDescriptionController extends Controller
{
    public function show($id)
    {

        $product = Product::with('productsDescription')->find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return response()->json($product);
    }
}
