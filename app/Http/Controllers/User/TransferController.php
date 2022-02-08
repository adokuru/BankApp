<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmailJob;
use App\Mail\TransferOTPMail;
use App\Models\Bank;
use App\Models\Banktransection;
use App\Models\Option;
use App\Models\Term;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Withdraw;
use App\Models\Withdrawmethod;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class TransferController extends Controller
{
    //==================== OWN BANK TRANSFER=========================//
    //Own Bank Info view
    public function ownbank(){
        return view('user.transfer.ownbank');
    }

    //Own Bank Transfer Confirmation
    public function ownbankConfirm(Request $request){
        $request->validate([
            'account_no'    => 'required',
            'amount'        => 'required',
        ]);

        // DB transfer info here 
        $transfer_credentials = Option::where('key','ownbank_charge')->get()->first();
        $transfer_credentials = json_decode($transfer_credentials->value);

        $amount = $request->amount; // transfer amount

        $user_balance = User::where('id', Auth::id())->pluck('balance')->first();
        $account_check = User::where([
            ['account_number', $request->account_no],
            ['id','!=',Auth::id()],
        ])->exists();

        //check if account exists
        if (!$account_check) {
            return redirect()->back()->with('account_err', "Invalid Account Number!")->withInput();
        }

        //if balance amount not empty
        if ($user_balance == '') {
            return redirect()->back()->with('error', "Balance is empty!")->withInput();
        }

        //if balance amount is valid
        if ($amount >= $user_balance) {
            return redirect()->back()->with('error', "Cannot transfer more than: " . $user_balance)->withInput();
        }
            //if amount is valid
        if ($amount < (double) $transfer_credentials->min_amount) {
            return redirect()->back()->with('error', "Cannot be less than " . $transfer_credentials->min_amount)->withInput();
        }elseif ($amount > (double) $transfer_credentials->max_amount) {
            return redirect()->back()->with('error', "Cannot be greater than " . $transfer_credentials->max_amount)->withInput();
        }

        $charge = 0;
        //Charge type check and calculate
        if ($transfer_credentials->charge_type == 'fixed') {
            // calculate fixed
            $charge = (double) $transfer_credentials->fix_charge;
            $amount = $amount - (double) $transfer_credentials->fixed_charge;
        }elseif ($transfer_credentials->charge_type == 'percentage') {
            // calculate percentage
            $charge = (($amount / 100) * (double) $transfer_credentials->percent_charge);
            $amount = $amount - $charge;
        }elseif ($transfer_credentials->charge_type == 'both'){
            //If both: minus the charge then calculate the percentage 
            $charge = (double) $transfer_credentials->fixed_charge;
            $charge += ($amount / 100) * (double) $transfer_credentials->percent_charge;
            // calculate percentage
            $amount = $amount - $charge;
        }

        $data = [
            'amount' => abs($request->amount),
            'total_amount' => abs($amount),
            'account_no' => $request->account_no,
            'charge_type' => $transfer_credentials->charge_type,
            'total_charge' => $charge
        ];

        session($data);

        $data = json_decode(json_encode($data), false);

        return view('user.transfer.ownbankConfirm', compact('data'));
    }

    //Own Bank Transfer OTP Request
    public function ownbankTransferOTP(Request $request){

        if (!$request->session()->get('otp_err') && $request->isMethod('post')) {
            $otp = rand(1000,9999);
            session(['transferOTP' => $otp]);

            $user = User::findOrFail(Auth::id());
            
            $data = [
                'email' => $user->email,
                'type'=> 'ownbank',
                'name' => $user->name,
                'account_no' => $request->session()->get('account_no'),
                'otp' => $otp,
            ];

            // Mail::to($user->email)->send(new TransferOTPMail($data));
            if (env('QUEUE_MAIL') == 'on') {
                dispatch(new SendEmailJob($data));
            }else{
                Mail::to($user->email)->send(new TransferOTPMail($data));
            }
            
            return response()->json('Mail Sent Successful!'); 
        }
        
        return redirect()->route('user.transfer.ownbank.transferotpview');
    }

    public function ownbankTransferOTPview(){
        return view('user.transfer.ownbankotpConfirm');
    }

    //Own Bank Transfer OTP Confirm 
    public function confirmOTP(Request $request){ 
        if ($request->otp != $request->session()->get('transferOTP')) {
            return redirect()->route('user.transfer.ownbank.transferotpview')->with('otp_err', "OTP not matched");
        }

        $amount = $request->session()->get('amount');
        $total_amount = $request->session()->get('total_amount');
        $charge = $request->session()->get('total_charge');
        $account_number = $request->session()->get('account_no');

        $user = User::findOrFail(Auth::id());

        $reciever = User::where('account_number', $account_number)->get()->first();

        $trxid = Str::random(16);

        $user->balance = $user->balance - $amount;
        $user->save();

        $reciever->balance = $reciever->balance + $total_amount;
        $reciever->save();

        $transaction = new Transaction();
        $transaction->user_id = $user->id;
        $transaction->trxid = $trxid;
        $transaction->amount = $amount;
        $transaction->balance = $user->balance;
        $transaction->fee = $charge;
        $transaction->status = 1;
        $transaction->info = 'Balance Transfer with stripe from Acc: '.$user->account_number . ' To Acc: '. $reciever->account_number;
        $transaction->type = 'ownbank_transfer_debit';
        $transaction->save();

        $transaction_reciever = new Transaction();
        $transaction_reciever->user_id = $reciever->id;
        $transaction_reciever->trxid = Str::random(16);
        $transaction_reciever->amount = $amount;
        $transaction_reciever->balance = $reciever->balance;
        $transaction_reciever->fee = $charge;
        $transaction_reciever->status = 1;
        $transaction_reciever->info = 'Recieved ' . $amount . ' from Acc : '.$user->account_number;
        $transaction_reciever->type = 'ownbank_transfer_credit';
        $transaction_reciever->save();
        return redirect()->route('user.transaction.history')->with('message', "Transfer successfull!");
    }


    //==================== ECURRENCY =========================//
    // E-currency Check from home View
    // public function ecurrencyCheckHome(Request $request){
    //     dd($request->all());
    // }
    // E-currency Transfer View
    public function ecurrency(){
       $withdraw_methods = Withdrawmethod::where('status', 1)->with('term')->get();
       return view('user.transfer.ecurrency', compact('withdraw_methods'));
    }

    //Ecurrency Transfer Confirmation
    public function ecurrencyCheck($id, Request $request){
        $amount = $request->amount;
        $withdraw_method = Withdrawmethod::findOrFail($id);
        $user = User::findOrFail(Auth::id());
        $currency = Term::findOrFail($request->currency);

        if ($user->balance == '' || $user->balance == 0) {
            $err= 'User Balance is empty';
            $error['errors']['err']=$err;
            return response()->json($error,401); 
        }

        if ($user->balance < $amount || $user->balance == '') {
            $err= 'Not enough money!!';
            $error['errors']['err']=$err;
            return response()->json($error,401); 
        }

        if ($withdraw_method->min_amount > $amount) {
            $err='Cannot Be less than '. $withdraw_method->min_amount;
            $error['errors']['err']=$err;
            return response()->json($error,401); 
        }

        if ($withdraw_method->max_amount < $amount) {
            $err= 'Cannot be greater than '.$withdraw_method->max_amount;
            $error['errors']['err']=$err;
            return response()->json($error,401); 
        }

        $charge = 0;
        //Charge type check and calculate
        if ($withdraw_method->charge_type == 'fixed') {
            // calculate fixed
            //$charge = (double) $withdraw_method->fix_charge;

            $charge = (double) $withdraw_method->fix_charge;
            $amount = $amount - $charge;

        }elseif ($withdraw_method->charge_type == 'percentage') {
            // calculate percentage
            $charge = (($amount / 100) * (double) $withdraw_method->percent_charge);
            $amount = $amount - $charge;
        }elseif ($withdraw_method->charge_type == 'both'){
            //If both: minus the charge then calculate the percentage 
            $charge = (double) $withdraw_method->fixed_charge;
            $charge += ($amount / 100) * (double) $withdraw_method->percent_charge;
            // calculate percentage
            $amount = $amount - $charge;
        }

        $data = [
            'withdraw_method_id' => $id,
            'term_id' => $request->currency,
            'amount_usd' => abs($request->amount),
            'account_number' => $user->account_number,
            'charge_type' => $withdraw_method->charge_type,
            'fee' => $charge,
            'amount_withdraw' => abs($amount * (double) $currency->slug),
        ];

        session($data);
        
        // return $request->all();
        return response()->json('Successful!');
    }

    //Ecurrency Transfer Confirmation
    public function ecurrencyConfirm(Request $request){
        
        Session::forget('err');
        $user = User::findOrFail(Auth::id());

        if ($user->balance < $request->session()->get('amount_usd') || $user->balance == '') {
            $err= 'Not enough money!';
            Session::put('err', $err);
        }

        if ($user->balance == '' || $user->balance == 0) {
            $err= 'User Balance is empty';
            Session::put('err', $err);
        }

        $data = [
            'withdraw_method_id' => $request->session()->get('withdraw_method_id'),
            'term_id' => $request->session()->get('term_id'),
            'amount_usd' => $request->session()->get('amount_usd'),
            'account_number' => $request->session()->get('account_number'),
            'charge_type' => $request->session()->get('charge_type'),
            'fee' => $request->session()->get('fee'),
            'amount_withdraw' => $request->session()->get('amount_withdraw'),
        ];

        $data['currency'] = Term::where('id', $request->session()->get('term_id'))->pluck('title')->first();
        $data['withdraw_method'] = Withdrawmethod::where('id', $request->session()->get('withdraw_method_id'))->pluck('title')->first();


        $data = json_decode(json_encode($data), false);
        return view('user.transfer.ecurrencyConfirm', compact('data'));
    }

    public function ecurrencyOTP(Request $request){
        if (!$request->session()->get('otp_err') && $request->isMethod('post')) {
            $otp = rand(1000,9999);
            session([
                'transferOTP' => $otp,
                'account' => $request->account ?? $request->session()->get('account') 
            ]);
            $user = User::findOrFail(Auth::id());

            $data = [
                'email' => $user->email,
                'name' => $user->name,
                'account_number' => $request->session()->get('account_number'),
                'otp' => $otp,
                'type'=> 'ecurrency',
                'transfer_type' => 'Ecurrency withdraw'
            ];

            if (env('QUEUE_MAIL') == 'on') {
                dispatch(new SendEmailJob($data));
            }else{
                Mail::to($user->email)->send(new TransferOTPMail($data)); 
            }

            
            return response()->json('Mail Sent Successful!'); 
        }

        

        return view('user.transfer.ecurrencyotpConfirm');
    }

    //E-currency Transfer OTP Confirm 
    public function ecurrencyconfirmOTP(Request $request){ 
        
        if ($request->otp != $request->session()->get('transferOTP')) {
            return redirect()->route('user.transfer.ecurrency.transferotpview')->with('otp_err', "OTP not matched");
        }

        
        $withdraw_method_id = $request->session()->get('withdraw_method_id');
        $term_id = $request->session()->get('term_id');
        $total_amount = $request->session()->get('amount_usd');
        $account_number = $request->session()->get('account_number');
        $fee = $request->session()->get('fee');
        $account = $request->session()->get('account');
        $amount_withdraw = $request->session()->get('amount_withdraw');

        $user = User::findOrFail(Auth::id());

        $reciever = User::where('account_number', $account_number)->get()->first();
        $trxid = Str::random(16);
        $user->balance = $user->balance - $total_amount;
        $user->save();

        $withdraw = new Withdraw();
        $withdraw->withdrawmethod_id = $withdraw_method_id;
        $withdraw->term_id = $term_id;
        $withdraw->user_id = $user->id;
        $withdraw->amount_withdraw = $amount_withdraw;
        $withdraw->amount_usd = $total_amount;
        $withdraw->fee = (double) $fee;
        $withdraw->account = $account;
        $withdraw->status = 2;
        $withdraw->save();

        $transaction = new Transaction();
        $transaction->user_id = $user->id;
        $transaction->trxid = $trxid;
        $transaction->amount = $total_amount;
        $transaction->balance = $user->balance;
        $transaction->fee = (double) $fee;
        $transaction->status = 1;
        $transaction->info = 'Balance withdraw '. $total_amount .' USD from Acc: ' . $account_number;
        $transaction->type = 'ecurrency_transfer';
        $transaction->save();
        return redirect()->route('user.transaction.history')->with('message', "Transfer successfull!");
    }


    //====================OTHER BANK TRANSFER=========================//

    //Other Bank view
    public function otherbank(){
        $countries = Term::where([
            ['type', 'country'],
            ['status', 1],
        ])->get();

        $currencies = Term::where([
            ['type', 'currency'],
            ['status', 1],
        ])->get();
        
        return view('user.transfer.otherbank', compact('countries','currencies'));
    }

    //Other Bank Transfer Confirmation
    public function otherbankConfirm(Request $request){
        

        // DB transfer info here 
        $transfer_credentials = Bank::findOrFail($request->bank);
        $currency = Term::findOrFail($request->currency); 
        $amount = $request->amount; // transfer amount

        $user_balance = User::where('id', Auth::id())->pluck('balance')->first();

        //if balance amount not empty
        if ($user_balance == '') {
            return redirect()->back()->with('error', "Balance is empty!")->withInput();
        }

        //if balance amount is valid
        if ($amount >= $user_balance) {
            return redirect()->back()->with('error', "Cannot transfer more than: " . $user_balance)->withInput();
        }
            //if amount is valid
        if ($amount < (double) $transfer_credentials->min_amount) {
            return redirect()->back()->with('error', "Cannot be less than " . $transfer_credentials->min_amount)->withInput();
        }elseif ($amount > (double) $transfer_credentials->max_amount) {
            return redirect()->back()->with('error', "Cannot be greater than " . $transfer_credentials->max_amount)->withInput();
        }

        //Charge type check and calculate
        $charge = 0;
        if ($transfer_credentials->charge_type == 'fixed') {
            // calculate fixed
            $charge = (double) $transfer_credentials->fix_charge;
            $amount = $amount - $charge;
        }elseif ($transfer_credentials->charge_type == 'percentage') {
            // calculate percentage
            $charge = (($amount / 100) * (double) $transfer_credentials->percent_charge);
            $amount = $amount - $charge;
        }elseif ($transfer_credentials->charge_type == 'both'){
            //If both: minus the charge then calculate the percentage 
            $charge = (double) $transfer_credentials->fix_charge;
            $charge += ($amount / 100) * (double) $transfer_credentials->percent_charge;
            // calculate percentage
            $amount = $amount - $charge;
        }
        $data = [
            'bank' => $request->bank,
            'branch' => $request->branch,
            'account_holder_name' => $request->account_holder_name,
            'currency_id' => $request->currency,
            'currency_name' => $currency->title,
            'currency_rate' => (double) $currency->slug,
            'amount' => abs($request->amount),
            'final_amount' => abs($amount * (double) $currency->slug),
            'account_no' => $request->account_no,
            'charge_type' => $transfer_credentials->charge_type,
            'total_charge' => $charge
        ];
        
        session($data);

        $data['usd'] = abs($request->amount);
        $data['bank_name'] = $transfer_credentials->name;

        $data = json_decode(json_encode($data), false);

        return view('user.transfer.otherbankConfirm', compact('data'));
    }

    //Other Bank Transfer OTP Request
    public function otherbankTransferOTP(Request $request){
        if (!$request->session()->get('otp_err') && $request->isMethod('post')) {
            $otp = rand(1000,9999);

            session(['transferOTP' => $otp]);

            $user = User::findOrFail(Auth::id());
            $bank_id = $request->session()->get('bank');
            
            $data = [
                'email' => $user->email,
                'name' => $user->name,
                'account_no' => $request->session()->get('account_no'),
                'otp' => $otp,
                'bank' => Bank::where('id', $request->session()->get('bank'))->pluck('name')->first(),
                'branch' => $request->session()->get('branch'),
                'account_holder_name' => $request->session()->get('account_holder_name'),
                'type'=> 'otherbank',
            ];

            if (env('QUEUE_MAIL') == 'on') {
                dispatch(new SendEmailJob($data));
            }else{
                Mail::to($user->email)->send(new TransferOTPMail($data));
            }
            // Mail::to($user->email)->send(new TransferOTPMail($data));
            return response()->json('Mail Sent Successful!'); 
        }
        
        return route('user.transfer.otherbank.transferotpview');
        
    }

    public function otherbankTransferOTPview(){
        return view('user.transfer.otherbankotpConfirm');
    }

    //other Bank Transfer OTP Confirm 
    public function OtherBankConfirmOTP(Request $request){ 
        if ($request->otp != $request->session()->get('transferOTP')) {
            return redirect()->route('user.transfer.otherbank.transferotpview')->with('otp_err', "OTP not matched");
        }

        $amount = $request->session()->get('amount');
        $final_amount = $request->session()->get('final_amount');
        $account_number = $request->session()->get('account_no');
        $account_holder_name = $request->session()->get('account_holder_name');
        $branch = $request->session()->get('branch');
        $reciever_account_number = $request->session()->get('account_no');
        $term_id = $request->session()->get('currency_id');
        $currency_rate = $request->session()->get('currency_rate');
        $bank_id = $request->session()->get('bank');
        $charge = $request->session()->get('total_charge');

        $data = [
            'account_number' => $account_number,
            'account_holder_name' => $account_holder_name,
            'branch' => $branch,
        ];

        $user = User::findOrFail(Auth::id());
        $user->balance = $user->balance - $amount;
        $user->save();

        $trxid = Str::random(16);
        $transaction = new Transaction();
        $transaction->user_id = $user->id;
        $transaction->trxid = $trxid;
        $transaction->amount = $amount;
        $transaction->balance = $user->balance;
        $transaction->fee = $charge;
        $transaction->status = 2;
        $transaction->info = 'Other Balance Transfer from Acc:'.$user->account_number . 'To Acc:'. $reciever_account_number;
        $transaction->type = 'otherbank_transfer';
        $transaction->save();

        $bank_transaction = new Banktransection();
        $bank_transaction->user_id = $user->id;
        $bank_transaction->term_id = $term_id;
        $bank_transaction->bank_id = $bank_id;
        $bank_transaction->transaction_id = $transaction->id;
        $bank_transaction->amount = $final_amount;
        $bank_transaction->currency_rate = (double) $currency_rate;
        $bank_transaction->info = json_encode($data);
        $bank_transaction->status = 2;
        $bank_transaction->save();
      
        return redirect()->route('user.transaction.history')->with('message', "Transfer successfull!");
    }


    //Bank by country id -- ajax request
    public function getCountryList(Request $request){ 
        $countries = Bank::where('term_id', $request->country_id)->get(['id', 'name']);
        return json_encode($countries);
    }
  
}
