<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
        $blogs = Auth::user()->blogs;
        return view('user.comments',compact('blogs'));
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        if ($comment->blog->user->id == Auth::id())
        {
            $comment->delete();
            return redirect()->back()->with('delete', 'comments deleted successfully');
        } else {
            return redirect()->back()->with('delete', 'You are not authorized to delete this comment');
            
        }
        return redirect()->back();
        
    }
}
