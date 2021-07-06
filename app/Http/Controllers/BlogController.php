<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Post $post){
        $category_widget = Category::all();

    	$posts = $post->latest()->take(8)->get();
    	return view('blog', compact('posts','category_widget'));
    }

    public function isi_blog($slug){
        // $category_widget = Category::all();
        
    	$data = Post::where('slug', $slug)->get();
        return view('blog.post_content', compact('data'));       
        // return view('blog.post_content');
    }
}
