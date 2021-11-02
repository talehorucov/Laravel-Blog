<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Post;
use Illuminate\View\Component;

class Footer extends Component
{
    public function __construct()
    {
        //
    }
    
    public function render()
    {
        $categories = Category::withCount('posts')->orderByDesc('posts_count')->take(8)->get();
        $mostview_posts = Post::orderByDesc('view_count')->take(3)->get();
        $galleries = Post::get('thumbnail');
        return view('components.footer',compact('categories','mostview_posts','galleries'));
    }
}
