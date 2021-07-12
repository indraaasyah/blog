<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Post $post)
    {
        $category_widget = Category::all();

    	$posts = $post->latest()->take(8)->get();
    	return view('blog', compact('posts','category_widget'));
    }

    public function post_content($slug)
    {
        $category_widget = Category::all();
    	
        $data = Post::where('slug', $slug)->get();
        return view('blog.post_content', compact('data','category_widget'));       
    }
    
    public function list_content()
    {
        $category_widget = Category::all();

    	$data = Post::latest()->paginate(6);
        return view('blog.list_content', compact('data','category_widget'));       
    }
    
    public function list_category(Category $category)
    {
        $category_widget = Category::all();

    	// $data = Post::latest()->paginate(6);
    	$data = $category->posts()->latest()->paginate(6);
        return view('blog.list_content', compact('data','category_widget'));       
    }

    public function search(Request $request)    {
        $category_widget = Category::all();

    	$data = Post::where('title', $request->search)->orWhere('title', 'like', '%'.$request->search.'%')->paginate(6);
        return view('blog.list_content', compact('data','category_widget'));
    }
}
