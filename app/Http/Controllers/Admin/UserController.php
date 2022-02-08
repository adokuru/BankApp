<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmailJob;
use App\Mail\TransactionMail;
use App\Mail\UserLoginOtp;
use App\Models\Deposit;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Withdraw;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\str;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade as PDF;

class UserController extends Controller
{
    public function index()
    {
        if (!Auth()->user()->can('user.index')) {
           return abort(401);
        }
        $users = User::where('role_id', 2)->latest()->paginate(30);
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        if (!Auth()->user()->can('user.create')) {
            return abort(401);
         }
        return view('admin.user.create');
    }


    public function profile($id){
        if (Auth::user()->id != $id) {
            return abort(403);
        }
        $user_id  = $id;
        $user_transactions = User::findOrFail($id);
        return view('admin.user.profile', compact('user_transactions', 'user_id'));
    }

    public function profile_edit($id)
    {
        if (Auth::user()->id != $id) {
            return abort(403);
        }
        $user_edit = User::findOrfail($id);
        return view('admin.user.profile_edit', compact('user_edit'));
    }

    // Admin user Store
    public function store(Request $request)
    {
        // Validate
        $request->validate([
            'name'         => 'required',
            'email'        => 'required|email|unique:users,email',
            'phone_number' => 'required',
            'password'     => 'required|string|min:6|',
        ]);
        // Account check
        $rend  = rand(100000, 888888) . rand(10000, 88888);
        $check = User::where('account_number', $rend)->first();
        if ($check == true) {
            return redirect()->back()->with('error', 'Account Number Already Exist');
        }

        // User store
        $user_store        = new User();
        $user_store->name  = $request->name;
        $user_store->email = $request->email;
        if ($request->email_verified_at == 'on') {
            $user_store->email_verified_at = date('Y-m-d H:i:s');
        }
        $user_store->password = Hash::make($request->password);
        $user_store->phone    = $request->phone_number;
        if ($request->phone_verified_at == 'on') {
            $user_store->phone_verified_at = date('Y-m-d H:i:s');
        }

        $user_store->account_number = $rend;
        $user_store->status         = $request->status;
        $user_store->save();

        return response()->json('User Added Successfully');
    }

    // User Edit
    public function edit($id)
    {
        if (!Auth()->user()->can('user.edit')) {
            return abort(401);
         }
        $user_edit = User::findOrfail($id);
        return view('admin.user.edit', compact('user_edit'));
    }

    //admin update
    public function profile_update(Request $request, $id)
    {
        if (Auth::user()->id != $id) {
            return abort(403);
        }
        // Validate
        $request->validate([
            'name'         => 'required',
            'email'        => 'required|email|unique:users,email,'.$id,
            'phone_number' => 'required',
            // 'password'     => 'required|string|min:6|',
        ]);

        // Account check
        $rend  = rand(100000, 888888) . rand(10000, 88888);
        $check = User::where('account_number', $rend)->first();
        if ($check == true) {
            return redirect()->back()->with('error', 'Account Number Already Exist');
        }

        // User update
        $user_update        = User::findOrFail($id);
        $user_update->name  = $request->name;
        $user_update->email = $request->email;

        if ($request->password != '') {
            $user_update->password = Hash::make($request->password);
        }

        $user_update->phone = $request->phone_number;
       
        if ($request->two_step_auth == 'on') {
            $user_update->two_step_auth = 1;
        } else {
            $user_update->two_step_auth = 0;
        }

        $user_update->save();

        return response()->json('User Updated Successfully');
    }


    // User Update
    public function update(Request $request, $id)
    {
        // Validate
        $request->validate([
            'name'         => 'required',
            'email'        => 'required|email|unique:users,email,'.$id,
            'phone_number' => 'required',
            'password'     => 'required|string|min:6|',
        ]);

        // Account check
        $rend  = rand(100000, 888888) . rand(10000, 88888);
        $check = User::where('account_number', $rend)->first();
        if ($check == true) {
            return redirect()->back()->with('error', 'Account Number Already Exist');
        }

        // User update
        $user_update        = User::findOrFail($id);
        $user_update->name  = $request->name;
        $user_update->email = $request->email;
        if ($request->email_verified_at == 'on') {
            $user_update->email_verified_at = date('Y-m-d H:i:s');
        } else {
            $user_update->email_verified_at = null;
        }
        if ($request->password) {
            $user_update->password = Hash::make($request->password);
        }
        $user_update->phone = $request->phone_number;
        if ($request->phone_verified_at == 'on') {
            $user_update->phone_verified_at = date('Y-m-d H:i:s');
        } else {
            $user_update->phone_verified_at = null;
        }
        if ($request->two_step_auth == 'on') {
            $user_update->two_step_auth = 1;
        } else {
            $user_update->two_step_auth = 0;
        }

        $user_update->status = $request->status;
        $user_update->save();

        return response()->json('User Updated Successfully');
    }

    // User View
    public function show($id)
    {
        if (!Auth()->user()->can('user.show')) {
            return abort(401);
         }
        
        $user_id  = $id;
        $user_transactions = User::findOrFail($id);
        $deposit = $withdraw = 0;

        $otherbank = Transaction::with('otherbank')->whereHas('otherbank', function($q){
            $q->where('status', 1);
        })->where('user_id',$id)->where('type','otherbank_transfer')->sum('amount');
        
        $ownbank_credit    = Transaction::where('user_id',$id)->where('type', 'ownbank_credit')->sum('amount');
        $ownbank_debit     = Transaction::where('user_id',$id)->where('type', 'ownbank_debit')->sum('amount');
        
        $deposit   = Deposit::where('user_id',$id)->where('status', 1)->sum('amount') + $ownbank_credit;
        $withdraw  = Withdraw::where('user_id',$id)->where('status', 1)->sum('amount_usd') + $otherbank + $ownbank_debit;
        
        // $deposit = Transaction::where('user_id',$id)
        // ->where(function ($query){
        //     $query->where('type','edeposit')
        //     ->orWhere('type','credit')
        //     ->orWhere('type','ownbank_transfer_credit')
        //     ->orWhere('type','bill_credit');
        // })
        // ->sum('amount');

        // $withdraw = Transaction::where('user_id',$id)
        // ->where(function ($query){
        //     $query->where('type','ecurrency_transfer')
        //     ->orWhere('type','otherbank_transfer')
        //     ->orWhere('type','debit')
        //     ->orWhere('type','ownbank_transfer_debit')
        //     ->orWhere('type','bill_debit');
        // })
        // ->sum('amount');

        $fee = Transaction::where('user_id',$id)->sum('fee');
        // foreach ($user_transactions->transactions as $value){
        //     if ($value->type == 'edeposit' || $value->type == 'credit' || $value->type == 'ownbank_transfer_credit' || $value->type == 'bill_credit'){
        //         $deposit += $value->amount;
        //     }else{
        //         $withdraw += $value->amount;
        //     }
        // }
        $amount = json_decode(json_encode([
            'deposit' => $deposit,
            'withdraw'=> $withdraw,
            'fee'=> $fee,
        ] 
        ));

        return view('admin.user.view', compact('user_transactions', 'user_id', 'amount'));
    }

    // User Delete
    public function destroy($id)
    {
        if (!Auth()->user()->can('user.delete')) {
            return abort(401);
        }
        $user_delete = User::findOrFail($id);
        $user_delete->delete();
        return redirect()->back()->with('success', 'Successfully Deleted');
    }

    // verified users
    public function verified_users()
    {
        if (!Auth()->user()->can('user.verified')) {
            return abort(401);
        }
        $verified_users = User::where('status', 1)->where('role_id', 2)->paginate(20);
        return view('admin.user.verified_users', compact('verified_users'));
    }

    // banded users
    public function banded_users()
    {
        if (!Auth()->user()->can('user.banned')) {
            return abort(401);
        }
        $banded_users = User::where('status', 0)->where('role_id', 2)->paginate(20);
        return view('admin.user.banded_users', compact('banded_users'));
    }

    // mobile_unverified users
    public function mobile_unverified()
    {
        if (!Auth()->user()->can('user.unverified')) {
            return abort(401);
        }
        $mobile_unverified = User::where('email_verified_at', null)->where('role_id', 2)->paginate(20);
        return view('admin.user.mobile_unverified', compact('mobile_unverified'));
    }

    // email_unverified users
    public function email_unverified()
    {
        if (!Auth()->user()->can('user.unverified')) {
            return abort(401);
        }
        $email_unverified = User::where('phone_verified_at', null)->where('role_id', 2)->paginate(20);
        return view('admin.user.email_unverified', compact('email_unverified'));
    }

    // User Search
    public function userSearchResuit(Request $request)
    {
        $data = $request->src;
        if ($request->type == 'email') {
            $search_resuit = User::where('email', 'LIKE', "%$data%")->where('status', 1)->where('role_id', 2)->paginate(20);
            return view('admin.user.search_resuit', compact('search_resuit'));
        }
        // Phone search
        if ($request->type == 'phone') {
            $search_resuit = User::where('phone', 'LIKE', "%$data%")->where('status', 1)->where('role_id', 2)->paginate(20);
            return view('admin.user.search_resuit', compact('search_resuit'));
        }
        // Account Number Search
        if ($request->type == 'account_number') {
            $search_resuit = User::where('account_number', 'LIKE', "%$data%")->where('status', 1)->where('role_id', 2)->paginate(20);
            return view('admin.user.search_resuit', compact('search_resuit'));
        }

    }

    // User Credit
    public function userCredits(Request $request, $id)
    {
        $user_id = $id;
        // Debit
        if ($request->bln_type == 'debit') {
            $debit_amount          = User::where('id', $user_id)->first();
            $debit                 = $debit_amount->balance - $request->amount;
            $debit_amount->balance = $debit;
            $debit_amount->save();
        }
        // Credit
        if ($request->bln_type == 'credit') {
            $credit_amount          = User::where('id', $user_id)->first();
            $credit                 = $credit_amount->balance + $request->amount;
            $credit_amount->balance = $credit;
            $credit_amount->save();
        }

        // Transaction
        $current_bln           = User::where('id', $user_id)->first();
        $transactions          = new Transaction();
        $transactions->user_id = $user_id;
        $transactions->trxid   = Str::random(10);
        $transactions->amount  = $request->amount;
        $transactions->balance = $current_bln->balance;
        $transactions->fee     = 0;
        $transactions->status  = '1';
        $transactions->info    = $request->description;
        $transactions->type    = $request->bln_type;
        $transactions->save();
        return response()->json('Added Successfully');
    }

    // User Transaction mail
    public function userTransactionMail(Request $request, $id)
    {
        $request->validate([
            'subject' => 'required',
            'msg'     => 'required',
        ]);
        $user      = User::where('id', $id)->first();
        $user_mail = $user->email;
        $data      = [
            'email' => $user_mail,
            'subject' => $request->subject,
            'msg'     => $request->msg,
            'type'    => 'user_transaction_mail',
        ];
        // Send Mail
        if(env('QUEUE_MAIL') == 'on'){
            dispatch(new SendEmailJob($data));
        }else{
            Mail::to($user_mail)->send(new TransactionMail($data));
        }


        

        return response()->json('Mail Send Successfully');
    }

    public function transactionReport($type, $id){
        $user = User::findOrFail($id);

        if ($type == 'withdraw') {
            $data = Transaction::where('user_id',$id)
            ->where(function ($query){
            $query->where('type','ecurrency_transfer')
            ->orWhere('type','otherbank_transfer')
            ->orWhere('type','debit')
            ->orWhere('type','ownbank_transfer_debit')
            ->orWhere('type','bill_debit');
            })
        ->latest()->get();
        }elseif ($type == 'deposit') {
            $data = Transaction::where('user_id',$id)
            ->where(function ($query){
                $query->where('type','edeposit')
                ->orWhere('type','credit')
                ->orWhere('type','ownbank_transfer_credit')
                ->orWhere('type','bill_credit');
            })
            ->latest()->get();
        }else{
            $data = Transaction::where('user_id',$id)
            ->latest()->get();
        }
        return view('admin.user.report', compact('data','user','type'))->with('i', 1);
    }

    public function createPDF($type, $id){
   
         // retreive all records from db
         $user = User::findOrFail($id);
         if ($type == 'withdraw') {
            $data = Transaction::where('user_id',$id)
            ->where(function ($query){
            $query->where('type','ecurrency_transfer')
            ->orWhere('type','otherbank_transfer')
            ->orWhere('type','debit')
            ->orWhere('type','ownbank_transfer_debit')
            ->orWhere('type','bill_debit');
            })
        ->latest()->get();
        }elseif ($type == 'deposit') {
            $data = Transaction::where('user_id',$id)
            ->where(function ($query){
                $query->where('type','edeposit')
                ->orWhere('type','credit')
                ->orWhere('type','ownbank_transfer_credit')
                ->orWhere('type','bill_credit');
            })
            ->latest()->get();
        }else{
            $data = Transaction::where('user_id',$id)
            ->latest()->get();
        }

        
      // share data to view
    //   view()->share('data',$data);
      $i = 1;
      $data = compact('type','id','data','user','i');
      $now = Carbon::now();
      $now = $now->toDateTimeString();
      $file_name = $type.'_report_' . $now. '.pdf';

      
      $pdf = PDF::loadView('admin.user.pdf', $data);
      return $pdf->download($file_name);

    }


    public function userLogin($id)
    {
        $user = User::where('role_id', 2)->findOrFail($id);
        Auth::logout();
        Auth::loginUsingId($user->id);
        return redirect('/user/dashboard');
    }

    // user Otp for login
    public function userOtp()
    {
        
        $user = User::findOrFail(Auth::id());
        $data['otp_number'] = $otp = rand(1000, 9999);
        $data['type'] = 'login_otp';
        $data['email'] = $user->email;
        Session::put('otp_number', $otp);
        Session::put('message', "Check your mail for otp!");
        // dd(env('QUEUE_MAIL'));


        if (env('QUEUE_MAIL') == 'on') {
            dispatch(new SendEmailJob($data));
        }else{
            Mail::to($user->email)->send(new UserLoginOtp($data));
        }
        
        return redirect()->route('user.otp.view');
    }

    public function userOtpView(){
        return view('user.userotp.login_otp');
    }

    public function profileOtp()
    {
        $user = User::findOrFail(Auth::id());
        $data['otp_number'] = $otp = rand(1000, 9999);
        $data['type'] = 'login_otp';
        $data['email'] = $user->email;

        Session::put('otp_number', $otp);
        Session::put('message', "Check your mail for otp!");

        if (env('QUEUE_MAIL') == 'on') {
            dispatch(new SendEmailJob($data));
        }else{
            Mail::to($user->email)->send(new UserLoginOtp($data)); 
        }
        
        return redirect()->route('profile.otp.view');
    }

    public function profileOtpView(){
        return view('admin.user.profile_otp');
    }
    // profile OtP confirmation
    public function profileOtpConfirmation(Request $request)
    {
        if($request->otp != Session::get('otp_number')) {
            Session::put('message', "OTP not matched");
            return redirect()->route('profile.otp.view');
        } else{
            if (Session::has('message')) {
                Session::forget('message');
            } 
            Session::put('otp_verified', true);
            Session::forget('otp_number');
            return redirect('/admin/dashboard');
        }
        
    }

    // Login OtP confirmation
    public function userOtpConfirmation(Request $request)
    {
        if($request->otp != Session::get('otp_number')) {
            Session::put('error', "OTP not matched");
            return redirect()->route('user.otp.view');
        } else{
            if (Session::has('message')) {
                Session::forget('message');
            } 
            Session::put('otp_verified', true);
            Session::forget('otp_number');
            return redirect('/user/dashboard');
        }
        
    }

}
