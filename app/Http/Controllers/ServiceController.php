<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(){
        $services = Service::latest()->take(6)->get();
        return view('services',compact('services'));
    }

    public function details($id){
        $services = Service::latest()->take(3)->get();
        $service_details = Service::where('id', $id)->get();
        return view('single_service', compact('service_details','services'));
    }
}
