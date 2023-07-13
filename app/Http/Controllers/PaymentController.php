<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;

class PaymentController extends Controller
{
    public function stripePayment(Request $request){

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $data = Stripe\Charge::create([
                "amount"=>200*100,
                "currency"=>"usd",
                "source"=>$request->stripeToken,
                "description"=>"Test payment from expert sahib"
        ]);
        // echo "<pre>"; print_r($data); die();

        Session::flash("success","Payment successfully!");

        return back();
    }
}
