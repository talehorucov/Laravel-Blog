<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CommentStoreRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CommentStoreRequest $request)
    {
        if ($request->ajax()) {
            $comment = new Comment();
            $comment->user_id = auth()->user()->id;
            $comment->post_id = $request->id;
            $comment->content = $request->content;
            $comment->save();
            
            return view('user.partials.comment',compact('comment'));
        }
    }
}
