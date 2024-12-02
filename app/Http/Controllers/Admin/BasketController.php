<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\BasketProduct;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class BasketController extends Controller
{

    public function index()
    {
        $user = auth()->user();

        if (!$user) {

            return response()->json(['error' => 'Please log in.'], 401);
        }

        if (!$user->basket) {
            $user->basket()->create();
        }

        $basketId = $user->basket->id;

        $basketItems = BasketProduct::where('basket_id', $basketId)->with('product')->get();

        $totalPrice = $basketItems->sum(function ($item) {

            return $item->product->product_price * $item->stock_count;
        });

        return response()->json([
            'basketItems' => $basketItems,
            'totalPrice' => $totalPrice,
        ]);
    }


    public function store(Request $request)
    {
        $user = auth()->user();

        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
            'selected_size' => 'required',
            'selected_color' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        if (!$user) {
            return response()->json(['error' => 'Please log in.'], 401);
        }

        // Create a basket for the user if it doesn't exist
        if (!$user->basket) {
            $user->basket()->create();
        }

        $basketId = $user->basket->id;
        $product = Product::find($request->product_id);
        $selectedSize = $request->input('selected_size');
        $selectedColor = $request->input('selected_color');

        if ($product) {
            if ($product->in_stock) {
                // Check if the product with the same size and color already exists in the basket
                $basket = BasketProduct::where('basket_id', $basketId)
                    ->where('product_id', $product->id)
                    ->where('selected_size', $selectedSize)
                    ->where('selected_color', $selectedColor)
                    ->first();

                if ($basket == null) {
                    // Add new product to the basket
                    $basketItem = new BasketProduct();
                    $basketItem->basket_id = $basketId;
                    $basketItem->product_id = $product->id;
                    $basketItem->selected_size = $selectedSize;
                    $basketItem->selected_color = $selectedColor;
                    $basketItem->stock_count = 1;
                    $basketItem->save();
                } else {
                    
                    if ($basket->stock_count + 1 > $product->quantity) {
                        return response()->json(['error' => 'Product is out of stock'], 400);
                    }

                    $basket->stock_count += 1;
                    $basket->save();
                }

                return response()->json(['message' => 'Product added to cart']);
            } else {
                return response()->json(['error' => 'Product is out of stock'], 400);
            }
        } else {
            return response()->json(['error' => 'Product not found'], 404);
        }
    }


    public function remove(Request $request)
    {
        $user = auth()->user();

        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        if (!$user) {
            return response()->json(['error' => 'Please log in.'], 401);
        }

        if (!$user->basket) {
            return response()->json(['error' => 'Please log in.'], 401);
        }

        $basketId = $user->basket->id;
        $product = Product::find($request->product_id);

        if ($product) {
            $basket = BasketProduct::where('basket_id', $basketId)
                ->where('product_id', $product->id)->first();

            if ($basket) {
                if ($basket->stock_count > 1) {
                    $basket->stock_count -= 1;
                    $basket->save();
                } else {
                    $basket->delete();
                }
                return response()->json(['message' => 'Product removed from cart']);
            } else {
                return response()->json(['error' => 'Product not found in cart'], 401);
            }
        } else {
            return response()->json(['error' => 'Product not found'], 401);
        }
    }
}
