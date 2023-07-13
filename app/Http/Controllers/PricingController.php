<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function index(){
        $services = Service::latest()->take(3)->get();
        return view('pricing', compact('services'));
    }
}
