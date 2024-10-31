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
                'product_color' => 'required|string',
                'family_color' => 'required|string'
            ];

            $customMessages = [
                'category_id.required' => 'Category name is required',
                'product_name.required' => 'Product name is required',
                'product_name.regex' => 'Valid name is required',
                'product_code.required' => 'Product code is required',
                'product_price.required' => 'Product price is required',
                'product_color.required' => 'Product color is required',
                'family_color.required' => 'Family color is required',
            ];


            $validator = Validator::make($data, $rules, $customMessages);

            if ($validator->fails()) {
                //dd($validator->errors());
                return redirect()->back()->withErrors($validator)->withInput();
            }
            // dd($data);

            if ($id) {
                //dd($data);
                $product = Product::findOrFail($id);
                $product->update($data);
                return redirect()->route('admin.products')->with('flash_message_success', 'Product updated successfully');
            } else {
                $product = new Product();
                $product->category_id = $data['category_id'];
                $product->product_name = $data['product_name'];
                $product->product_code = $data['product_code'];
                $product->product_color = $data['product_color'];
                $product->family_color = $data['family_color'];
                $product->product_size = $data['product_size'];
                $product->group_code = $data['group_code'];
                $product->product_price = $data['product_price'];
                $product->product_discount = $data['product_discount'];
                $freeShipping = $request->has('free_shipping') ? 1 : 0;
                $product->free_shipping = $freeShipping;

                $free_changes_return = $request->has('free_changes_return') ? 1 : 0;
                $product->free_changes_return = $free_changes_return;
                //$product->free_changes_return = $data['free_changes_return'];
                $product->description = $data['description'];
                $product->wash_care = $data['wash_care'];
                $product->fabric = $data['fabric'];
                $product->pattern = $data['pattern'];
                $product->meta_title = $data['meta_title'];
                $product->meta_keyword = $data['meta_keyword'];
                $product->meta_description = $data['meta_description'];
                $product->save();
                return redirect()->route('admin.products')->with('flash_message_success', 'Product added successfully');
            }
        }

        $categories = Category::all();
        return view('admin.products.add_edit_product', compact('title', 'categories', 'id'));
    }
}
