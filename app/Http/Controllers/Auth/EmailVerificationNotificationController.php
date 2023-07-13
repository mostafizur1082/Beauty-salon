<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            if (Auth::check() && Auth::user()->role->id == 1)
        {
            return redirect()->intended(RouteServiceProvider::ADMIN_DASHBOARD);
        } elseif (Auth::check() && Auth::user()->role->id == 2){
            return redirect()->intended(RouteServiceProvider::RECEPTIONIST_DASHBOARD);
        }else{
            return redirect()->intended(RouteServiceProvider::USER_DASHBOARD);
        }
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
