<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index($category_slug)
    {
        $category = Category::whereSlug($category_slug)->firstOrFail();
        $posts = Post::with('user','tags')->whereHas('category', function ($query) use ($category_slug) {
            $query->where('slug', $category_slug);
        })->where('publish',false)->orderByDesc('id')->paginate(10);
        $tags = Tag::all();
        return view('user.post.index', compact('posts','category','tags'));
    }

    public function show($category_slug,$slug)
    {
        $category = Category::whereSlug($category_slug)->firstOrfail();
        $post = Post::with('user')->whereSlug($slug)->firstOrfail();
        return view('user.post.show',compact('category','post'));
    }
}
