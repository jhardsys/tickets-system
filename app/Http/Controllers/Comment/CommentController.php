<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required'
        ]);

        $comment = new Comment;
        $comment->ticket_id = $request->ticket;
        $comment->body = $request->comment;
        $comment->commentable_type = session('role');
        $comment->commentable_id = "1";
        $comment->save();
        return redirect()->route('client.tickets.show', ['ticket' => $request->ticket]);
    }
}
