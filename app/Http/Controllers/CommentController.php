<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function postCreateComment(Request $request)
    {
        $this->validate($request, [
            'body' => 'required|max:500'
        ]);

        $comment = new Comment();
        $comment->body = $request->body;
        $comment->user_id = Auth::id();
        $message = 'There was an error';
        if ($request->post()->comments()->save($comment)) {
            $message = 'Commetn successfully created!';
        }

        return redirect()->route('dashboard')->with(['message' => $message]);
    }

}
