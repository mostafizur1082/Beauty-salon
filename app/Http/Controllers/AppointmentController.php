<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index(){
        $services = Service::all();
        return view('appointment', compact('services'));
    }

    public function store(Request $request){
        // dd($request->all());

        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'zip' => 'required',
            'city' => 'required',
            'services'=> 'required',
            'date' => 'required',
            'time' => 'required',
        ]);

        $appointment = new Appointment();
        $appointment->user_id = Auth::id();
        $appointment->first_name = $request->first_name;
        $appointment->last_name = $request->last_name;
        $appointment->email = $request->email;
        $appointment->phone = $request->phone;
        $appointment->address = $request->address;
        $appointment->zip = $request->zip;
        $appointment->city = $request->city;
        $appointment->date = Carbon::createFromFormat('m/d/Y', $request->date)->format('Y-m-d');
        $appointment->time = $request->time;
        $appointment->save();

        $appointment->services()->sync($request->services);
        return redirect()->route('payment');       
    }

    public function payment(){
        $appointment = Appointment::all();
        return view('payment', compact('appointment'));
    }
}
