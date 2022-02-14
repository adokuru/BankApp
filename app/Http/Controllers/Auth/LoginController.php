<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use PDO;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo()
    {

        if(Auth::check() && Auth::user()->role_id == 1) {
            if(Auth::user()->two_step_auth == 1) {
                return $this->redirectTo = route('profile.otp');
            } 
            return $this->redirectTo = route('admin.dashboard');
         
        } elseif(Auth::check()) {
            if(Auth::user()->two_step_auth == 1) {
               return $this->redirectTo = route('user.otp');
            } else {
                if (Session::has('withdraw_method_id')) {
                    $user = User::findOrFail(Auth::id());
                    session([
                        'account_number' => $user->account_number,
                    ]);
                    return $this->redirectTo = route('user.transfer.ecurrency.confirm');
                }else {
                    return $this->redirectTo = route('user.dashboard');
                }
            }
        }
        else {
            return $this->redirectTo = route('login');
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        Session::flush();
        return redirect('/admin/login');
    }
}
