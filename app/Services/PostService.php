<?php

namespace App\Services;

use App\Models\Post;

class PostService
{
    public function nextPost($id)
    {
        return Post::with('category')->where('id', '>', $id)->orderBy('id')->first();
    }

    public function previousPost($id)
    {
        return Post::with('category')->where('id', '<', $id)->orderByDesc('id')->first();
    }
}
