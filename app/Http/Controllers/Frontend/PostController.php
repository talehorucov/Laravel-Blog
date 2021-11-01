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
        })->where('publish', false)->orderByDesc('id')->paginate(10);
        $tags = Tag::all();
        return view('user.post.index', compact('posts', 'category', 'tags'));
    }

    public function show($category_slug, $slug)
    {
        $category = Category::whereSlug($category_slug)->firstOrfail();
        $post = Post::with('user','tags')->whereSlug($slug)->firstOrfail();
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
        $posts = Category::with('latestPost')->take(6)->get();
        $view = view('user.post.card', compact('posts'))->render();
        // return response()->json(['success' => $view]);
        // echo view('user.post.card', compact('posts'))->render();
        // return response()->view('user.post.card', compact('posts'));
        // return response()->json([
        //     'test' => view('user.post.card')->with('posts',$posts)->render()
        // ]);
        return response()->json(['success' => $view]);
    }
}
