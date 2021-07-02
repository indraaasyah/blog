<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all(); // menampilkan data tag di form select tag
        $categories = Category::all(); // menampilkan data kategori di form select category
        return view('admin.post.create', compact('categories', 'tags'));
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'category_id' => 'required',
            'content' => 'required',
            'image' => 'required'
        ]);

        $image = $request->image; //mengambil gambar dari hasil validate
        $new_image = time().$image->getClientOriginalName(); //mengubah nama gambar agar unik

        $posts = Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'category_id' => $request->category_id,
            'content' => $request->content,
            'image' => 'public/uploads/posts/'. $new_image,
        ]);

        $posts->tags()->attach($request->tags);


        $image->move('public/uploads/posts/', $new_image); //memindahkan gambar yg diupload ke dalam folder public
        return redirect()->back()->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        // $posts = Post::find(1);
        $posts = Post::findOrFail($id);
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.post.edit', compact('posts','tags','categories'));
    }

 
    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title' => 'required',
            'category_id' => 'required',
            'content' => 'required',
        ]);

        if ($request->has('image')) {
            $image = $request->image;
            $new_image = time().$image->getClientOriginalName();
            $image->move('public/uploads/posts/', $new_image); //memindahkan gambar yg diupload ke dalam folder public
            
            $posts_data = [
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'category_id' => $request->category_id,
                'content' => $request->content,
                'image' => 'public/uploads/posts/'. $new_image 
            ];
        }else{
            $posts_data = [
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'category_id' => $request->category_id,
                'content' => $request->content,
            ];
        }

        // $post->tags()->detach();
        $post->tags()->sync($request->tags);
        $post->update($posts_data);

        return redirect()->route('post.index')->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
