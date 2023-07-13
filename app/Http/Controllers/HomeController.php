<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Team;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $sliders = Slider::latest()->take(3)->get();
        $services = Service::latest()->take(3)->get();
        $galleries = Gallery::latest()->take(6)->get();
        $teams = Team::latest()->take(4)->get();
        $testimonials = Testimonial::latest()->take(4)->get();
        return view('home',compact('sliders', 'services','galleries','teams','testimonials'));
    }

    
}
