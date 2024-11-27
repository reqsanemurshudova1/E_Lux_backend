<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    public function products()
    {
        $products = Product::get()->toArray();
        return view('admin.products.products')->with(compact('products'));
    }

    public function update_product(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $status = ($data['status'] == "Active") ? 0 : 1;
            Product::where('id', $id)->update(['status' => $status]);
            return redirect()->back()->with('flash_message_success', 'Product Status Updated Successfully');
        }
    }

    public function delete_product(Request $request, $id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();

            return redirect()->back()->with('flash_message_success', 'Product Deleted Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to Delete Product');
        }
    }
    public function addEditProduct(Request $request, $id = null)
    {
        $title = $id ? "Edit Product" : "Add Product";

        if ($request->isMethod('POST')) {
            $data = $request->all();

            $rules = [
                'category_id' => 'required|exists:categories,id',
                'product_name' => 'required|regex:/^[a-zA-Z0-9\s]+$/',
                'product_code' => 'required|alpha_num',
                'product_price' => 'required|numeric|min:0',
                'family_color' => 'required|string',
                'product_color' => 'required|array',
                'product_size' => 'required|array',
                'image.*' => 'image|mimes:jpeg,png,jpg,gif',
            ];

            $customMessages = [
                'category_id.required' => 'Category name is required',
                'product_name.required' => 'Product name is required',
                'product_name.regex' => 'Valid name is required',
                'product_code.required' => 'Product code is required',
                'product_price.required' => 'Product price is required',
                'family_color.required' => 'Family color is required',
                'image.*.image' => 'Uploaded file must be an image',
                'product_color.required' => 'Please select at least one color.',
                'product_size.required' => 'Please select at least one size.',
                'image.*.mimes' => 'Image must be a type of jpeg, png, jpg, gif',

            ];

            $validator = Validator::make($data, $rules, $customMessages);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $product = $id ? Product::findOrFail($id) : new Product();


            $product->category_id = $data['category_id'];
            $product->product_name = $data['product_name'];
            $product->product_code = $data['product_code'];
            $product->family_color = $data['family_color'];
            $product->group_code = $data['group_code'] ?? null;
            $product->product_color = $data['product_color'];
            $product->product_size = $data['product_size'];
            $product->product_price = $data['product_price'];
            $product->product_discount = $data['product_discount'] ?? 0;
            $product->free_shipping = $request->has('free_shipping') ? 1 : 0;
            $product->free_changes_return = $request->has('free_changes_return') ? 1 : 0;
            $product->description = $data['description'] ?? null;
            $product->wash_care = $data['wash_care'] ?? null;
            $product->fabric = $data['fabric'] ?? null;
            $product->pattern = $data['pattern'] ?? null;
            $product->meta_title = $data['meta_title'] ?? null;
            $product->meta_keyword = $data['meta_keyword'] ?? null;
            $product->meta_description = $data['meta_description'] ?? null;
            $product->in_stock = $data['in_stock'] ?? 1;
            $product->quantity = $data['quantity'] ?? 0;



            if ($request->hasFile('images')) {
                // $imagePath = $request->file('images')->store('uploads', 'public');
                // $product->image = $imagePath;
                foreach ($request->file('images') as $file) {
                    $filePath = $file->store('photos', 'public');
                    $product->image = $filePath;
                }
            }
           
            $product->save();
            dd($product);
            $message = $id ? 'Product updated successfully' : 'Product added successfully';
            return redirect()->route('admin.products')->with('flash_message_success', $message);
        }

        $categories = Category::all();
        return view('admin.products.add_edit_product', compact('title', 'categories', 'id'));
    }
    public function getProducts()
    {
        $products = Product::with('category')->get();
        return response()->json(['products' => $products]);
    }





}
