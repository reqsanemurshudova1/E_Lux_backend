<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255', // Burada doğru alan adı
        ]);
    
        $category = new Category();
        $category->category_name = $request->category_name; 
        $category->save();
    
        return redirect()->route('admin.category.index')->with('flash_message_success', 'Category created successfully!');
    }
    
    


    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required|string|max:255', // Burada doğru alan adı
        ]);
    
        $category = Category::findOrFail($id);
        $category->update($request->all()); // 'category_name' burada otomatik olarak güncellenecektir
    
        return redirect()->route('admin.category.index')->with('flash_message_success', 'Category updated successfully!');
    }
    

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.category.index')->with('flash_message_success', 'Category deleted successfully!');
    }
}
