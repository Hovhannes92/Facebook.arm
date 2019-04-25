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

        $comment = $post->comments()->create([
            'body' => $request->body,
            'user_id' => Auth::id()
        ]);

        $comment = Comment::where('id', $comment->id)->with('user')->first();

        return $comment;

        return redirect()->route('dashboard');
    }

}
