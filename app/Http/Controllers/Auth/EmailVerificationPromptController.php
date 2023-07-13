<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        return $request->user()->hasVerifiedEmail()
                    ? if (Auth::check() && Auth::user()->role->id == 1)
                        {
                        redirect()->intended(RouteServiceProvider::ADMIN_DASHBOARD);
                        } elseif (Auth::check() && Auth::user()->role->id == 2){
                        redirect()->intended(RouteServiceProvider::RECEPTIONIST_DASHBOARD);
                        }else{
                        redirect()->intended(RouteServiceProvider::USER_DASHBOARD);
                        }
                    : view('auth.verify-email');
    }
}
        