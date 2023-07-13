<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Service;
use App\Models\Tag;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index(){
        $blogs = Blog::all();
        $total_pending_blogs = Blog::where('is_approved',false)->count();
        $user_count = User::where('role_id',3)->count();
        $receptionist_count = User::where('role_id',2)->count();
        $new_user_today = User::where('role_id',3)
                                ->whereDate('created_at',Carbon::today())->count();
        $category_count = Category::all()->count();
        $tag_count = Tag::all()->count();
        $services_count = Service::all()->count();
        return view('admin.dashboard', compact('blogs','total_pending_blogs','user_count','receptionist_count','new_user_today','category_count','tag_count','services_count'));
    }
}
