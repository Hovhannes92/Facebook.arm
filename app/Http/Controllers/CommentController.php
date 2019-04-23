<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function postCreateComment(Request $request, Post $post)
    {
        $this->validate($request, [
            'body' => 'required|max:500'
        ]);

        $comment = new Comment();
        $comment->body = $request->body;
        $comment->user_id = Auth::id();

        $post->comments()->save($comment);

        return redirect()->route('dashboard');
    }

}
