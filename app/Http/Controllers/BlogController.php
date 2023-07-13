<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $categories = Category::all();
        $tags = Tag::all();
        $blogs = Blog::where('status', '=', 1)->where('is_approved', '=', 1)->latest()->paginate(4);
        return view('blogs', compact('blogs','categories','tags'));
    }

    public function details($id){
        $blog_details = Blog::where('id', $id)->get();

        return view('single_blog', compact('blog_details'));
    }

   
}
