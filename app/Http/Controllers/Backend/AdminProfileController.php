<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    public function index()
    {
        $post_count = Post::where('user_id',auth()->user()->id)->count();
        $comment_count = Comment::where('user_id',auth()->user()->id)->count();
        return view('admin.profile.index',compact('post_count','comment_count'));
    }
}
