<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $teams = Team::all();
        return view('aboutus',compact('teams'));
    }
}
