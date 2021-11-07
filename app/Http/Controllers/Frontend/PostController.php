<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Star;
use App\Models\Tag;
use App\Services\PostService;
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
        $post = Post::with('user', 'tags', 'comments')->withCount('comments', 'stars')->whereSlug($slug)->firstOrfail();
        $similar_posts = Post::where('category_id', $category->id)->with('category')->take(6)->get();
        $latest_posts = Post::with('category')->orderByDesc('id')->take(6)->get();
        $mostview_posts = Post::with('category')->orderByDesc('view_count')->take(5)->get();
        $post->increment('view_count');
        $post->save();
        $tags = Tag::all();

        $postService = new PostService;
        $nextPost = $postService->nextPost($post->id);
        $previousPost = $postService->previousPost($post->id);
        if (auth()->user()) {
            $check_star = Star::where('user_id', auth()->user()->id)->where('post_id', $post->id)->first();
        } else {
            $check_star = null;
        }

        return view('user.post.show', compact('category', 'post', 'tags', 'similar_posts', 'latest_posts', 'mostview_posts', 'check_star', 'nextPost', 'previousPost'));
    }

    public function latest_posts()
    {
        $posts = Post::with('category', 'user')->orderByDesc('id')->paginate(5);
        $tags = Tag::all();
        $mostview_posts = Post::with('category')->orderByDesc('view_count')->take(5)->get();
        return view('user.post.latest', compact('posts', 'tags', 'mostview_posts'));
    }

    public function tag_posts($tag_slug)
    {
        $tag = Tag::whereSlug($tag_slug)->firstOrFail();
        $posts = Post::with('user', 'category')->whereHas('tags', function ($query) use ($tag_slug) {
            $query->where('slug', $tag_slug);
        })->where('publish', false)->orderByDesc('id')->get();
        $tags = Tag::all();
        return view('user.tag.index', compact('posts', 'tags', 'tag'));
    }

    public function like(Request $request)
    {
        if (auth()->user()) {
            if ($request->ajax()) {
                $check_star = Star::where('user_id', auth()->user()->id)->where('post_id', $request->id)->first();
                if ($check_star) {
                    $check_star->delete();
                    return response()->json([
                        'success' => 'Postu Bəyənmədiniz',
                        'unlike' => 'unlike'
                    ]);
                } else {
                    $star = new Star();
                    $star->user_id = auth()->user()->id;
                    $star->post_id = $request->id;
                    $star->save();
                    return response()->json([
                        'success' => 'Postu Bəyəndiniz',
                        'like' => 'like'
                    ]);
                }
            }
        } else {
            return response()->json([
                'error' => 'Bəyənmək üçün sayta giriş etməlisiniz'
            ]);
        }
    }

    public function search(Request $request)
    {
        return $request;
        $title = $request->search();
        $posts = Post::with('user', 'tags', 'category')->where('title', 'LIKE', "%$title%")->get();
        $tags = Tag::get();
        return view('user.post.search', compact('posts', 'tags', 'title'));
    }
}
