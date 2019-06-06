<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CreateCommentRequest;
use App\Post;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function postCreateComment(CreateCommentRequest $request, Post $post)
    {
//        dd($request->all());
//        $this->validate($request, [
//            'text' => 'required|max:500'
//        ]);

        $comment = new Comment();
        $comment->text = $request->text;
        $comment->user_id = Auth::id();

        $post->comments()->save($comment);

        $post->comments()->create($request->all());

        return redirect()->route('dashboard');
    }

}
