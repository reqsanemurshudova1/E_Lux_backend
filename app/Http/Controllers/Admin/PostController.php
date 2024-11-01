<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $posts = Post::all(); 
        return view('admin.posts.create', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
  
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->author = $request->author;
        $post->category = $request->category;
    
       
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
            $post->image = $imagePath;
        }
    
      
        $post->save();
    
        return redirect()->route('admin.posts.index')->with('success', 'Post created successfully.');
    }
    
    
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'nullable|string|max:255',
            'category' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $post->title = $request->title;
        $post->content = $request->content;
        $post->author = $request->author;
        $post->category = $request->category;
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
            $post->image = $imagePath;
        }
    
        $post->save();
    
        return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully.');
    }
    
    
    public function edit($id)
    {
        $post = Post::findOrFail($id); 
        return view('admin.posts.edit', compact('post'));
    }
    

   

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Post deleted successfully.');
    }
}
