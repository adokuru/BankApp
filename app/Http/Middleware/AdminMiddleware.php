<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (url()->previous() == route('admin.login')) {
            $redirect =  'admin.login';
        }else{
            $redirect =  'login';
        }

    
        if(Auth::check() && Auth::user()->role_id == 1 && Auth::user()->status == 1) { 
            if(Auth::user()->two_step_auth == 1 && Session::has('otp_verified')) {
                return $next($request);
            } elseif(Auth::user()->two_step_auth == 0) {
                return $next($request);
            } else {
                return redirect('/profile/otp');
            }
        } else {
            Session::flash('message', 'Your account is not active!');
            Auth::logout();
            return redirect()->route($redirect);
        }
    }
}
