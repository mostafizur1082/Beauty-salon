<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    
    public function store(Request $request,$blog)
    {
        $this->validate($request,[
            'comment' => 'required'
        ]);

        $comment = new Comment();
        $comment->blog_id = $blog;
        $comment->user_id = Auth::id();
        $comment->comment = $request->comment;
        $comment->save();
        
        return redirect()->back()->with('message', 'Comment Successfully Published');
    }
}
