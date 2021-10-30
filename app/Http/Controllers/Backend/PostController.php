<?php

namespace App\Http\Controllers\Backend;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Http\Requests\Admin\PostStoreRequest;
use App\Http\Requests\Admin\PostUpdateRequest;
use App\Models\Tag;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.store', compact('categories','tags'));
    }

    public function store(PostStoreRequest $request)
    {
        $image = $request->file('thumbnail');
        $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(600, 300)->save('upload/posts/' . $image_name);
        $image_url = 'upload/posts/' . $image_name;

        $post = new Post();
        $post->user_id = auth()->user()->id;
        $post->category_id = $request->category_id;
        $post->content = $request->content;
        $post->title = $request->title;
        $post->thumbnail = $image_url;
        $post->save();

        $post->tags()->attach($request->tags);
        
        $notification = [
            'message' => 'Məqalə uğurla əlavə edildi',
            'alert-type' => 'success'
        ];
        return redirect()->route('admin.posts.index')->with($notification);
    }

    public function show(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.show', compact('post', 'categories','tags'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.edit', compact('post', 'categories','tags'));
    }

    public function update(PostUpdateRequest $request, Post $post)
    {
        if ($request->thumbnail) {
            $image = $request->file('thumbnail');
            $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/posts/' . $image_name);
            $image_url = 'upload/posts/' . $image_name;
            unlink($post->thumbnail);
            $post->thumbnail = $image_url;
        }

        $post->category_id = $request->category_id;
        $post->content = $request->content;
        $post->title = $request->title;
        $post->save();
        
        $post->tags()->sync($request->tags);

        $notification = [
            'message' => 'Məqalə redaktə edildi',
            'alert-type' => 'success'
        ];
        return redirect()->route('admin.posts.index')->with($notification);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        $notification = array(
            'message' => 'Məqalə uğurla silindi',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.posts.index')->with($notification);
    }

    public function active(Post $post)
    {
        $post->publish = true;
        $post->save();
        $notification = array(
            'message' => 'Məqalə aktiv edildi',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.posts.index')->with($notification);
    }

    public function inactive(Post $post)
    {
        $post->publish = false;
        $post->save();
        $notification = array(
            'message' => 'Məqalə deaktiv edildi',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.posts.index')->with($notification);
    }
}
