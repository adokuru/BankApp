<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Option;
use App\Models\User;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function __construct()
    {
       $this->middleware('guest')->except(['phone_verification_resend','logout','otp_view','phone_verification']);
    }
    
    public function register_form()
    {
        $codes=file_get_contents(base_path('phonecode.json'));
        $codes=json_decode($codes);
      
        return view('user.register',compact('codes'));
    }

    public function register(Request $request){

        // Validate
        $request->validate([
            'name'         => 'required',
            'email'        => 'required|email|unique:users,email',
            'phone_number' => 'required|max:15|min:9',
            'password'     => 'required|confirmed|min:6',
            'term_condition' => 'required'
        ]);

        // Account check
        $verification_settings = Option::where('key', 'verification_settings')->first('value');
        $verification_settings = json_decode($verification_settings->value);

        // User store
        $user_store       = new User();
        $user_store->name  = $request->name;
        $user_store->email = $request->email;


        if ($verification_settings->email_verification != 'on') {
            $user_store->email_verified_at = date('Y-m-d H:i:s');
        }

        if ($verification_settings->phone_verification == 'on') {
            $phone_verify = true;
            
        }else{
            $user_store->phone_verified_at = date('Y-m-d H:i:s'); 
            $phone_verify = false;
        }

        
        $user_store->password = Hash::make($request->password);
        $user_store->phone    = str_replace(' ','',$request->phone_code.$request->phone_number);

        $user_store->account_number = $this->generateAccNo();
        $user_store->status         = 1;
        $user_store->save();
        Auth::login($user_store);
     

        if ($phone_verify) {
            Session::put('user_phone_number', $request->phone_code.$request->phone_number);
            Session::put('user_id', $user_store->id);
            $this->otp_generate();
            Session::put('message','Check your phone for otp');
            return redirect()->route('phone.verification');
        }

        if (Session::has('withdraw_method_id')) {
            $user = User::findOrFail(Auth::id());
            session([
                'account_number' => $user->account_number,
            ]);
            return redirect()->route('user.transfer.ecurrency.confirm');
        }else {
            return redirect('/user/dashboard');
        }
        
    }

    public function phone_verification(Request $request){ 
        if ($request->isMethod('POST')) {
            if ($request->session()->get('register_otp') != $request->otp) {
                Session::put('message','OTP Not matched');
                return redirect()->route('phone.verification.view');
            }else{
                $user_store = User::findOrFail($request->session()->get('user_id') ?? Auth::user()->id);
                $user_store->phone_verified_at = date('Y-m-d H:i:s');
                $user_store->save();
                // Auth::login($user_store);
                return redirect('/user/dashboard');
            }  
        } 
        return view('user.phone_verification');
    }
  

    public function phone_verification_resend(Request $request){
        $this->otp_generate();
        Session::put('message','Check your phone for new otp');
        return redirect()->route('phone.verification.view');
    }


    public function otp_view(Request $request){
        if (!$request->session()->get('register_otp')) {
            $this->otp_generate();
        }
        return view('user.phone_verification');   
    }
    // public function login_form()
    // {
    //     return view('user.login');
    // }

    public function logout(Request $request) {
        Auth::logout();
        Session::flush();
        return redirect('/login');
    }


    public function generateAccNo(){
        $rend = rand(10000000, 99999999). rand(10000000, 99999999);
        $check = User::where('account_number', $rend)->first();

        if($check == true){
            $rend = $this->generateAccNo();
        }
        return $rend;
    }


    public function otp_generate(){
        $register_otp = rand(1000,9999);
        $phone = Session::get('user_phone_number') ?? Auth::user()->phone;
        $twilio = Option::where('key','twilio_info')->first();
        $twilio = json_decode($twilio->value);
        Session::put('register_otp', $register_otp);
        phone_verify($twilio->message. $register_otp, $phone );
    }


}
