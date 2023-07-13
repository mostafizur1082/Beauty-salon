<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $user = Auth::user();
        $blogs = $user->blogs;
        $total_pending_blogs = $blogs->where('is_approved',false)->count();
        return view('user.dashboard',compact('blogs','total_pending_blogs'));
    }
}
