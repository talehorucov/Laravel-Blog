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
        $posts = Post::with('user', 'tags')->whereHas('category', function ($query) use ($category_slug) {
            $query->where('slug', $category_slug);
        })->where('publish', false)->orderByDesc('id')->get();
        $tags = Tag::all();
        return view('user.post.index', compact('posts', 'category', 'tags'));
    }

    public function show($category_slug, $slug)
    {
        $category = Category::whereSlug($category_slug)->firstOrfail();
        $post = Post::with('user','tags','comments')->withCount('comments')->whereSlug($slug)->firstOrfail();
        $post->increment('view_count');
        $post->save();
        $tags = Tag::all();
        return view('user.post.show', compact('category', 'post','tags'));
    }

    public function latest_posts()
    {
        $posts = Post::with('category', 'user')->orderByDesc('id')->paginate(5);
        $tags = Tag::all();
        return view('user.post.latest', compact('posts', 'tags'));
    }

    public function post_all()
    {
        $categories = Category::with('latest_post.user')->take(6)->get();
        return view('user.post.card', compact('categories'));
    }
}
