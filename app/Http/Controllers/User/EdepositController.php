<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Depositmeta;
use App\Models\Getway;
use App\Models\Term;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Omnipay\Omnipay;
use Illuminate\Support\Str;
use App\Lib\Paypal;
use App\Lib\Razorpay;
use App\Lib\Mollie;
use App\Lib\Instamojo;
use App\Lib\Toyyibpay;
use App\Lib\Paystack;
use App\Lib\Coinpaymentbtc;

class EdepositController extends Controller
{
    public function index(){
        $gateways = Getway::where('status',1)->with('term')->get(); 
        return view('user.edeposit.index', compact('gateways'));
    }

    public function show($id){
        $edeposit = Deposit::with('meta')->where('user_id',Auth::id())->findOrFail($id);
        return view('user.edeposit.show', compact('edeposit'));
    }

    public function check($id, Request $request){
        $gateway = Getway::where('status',1)->findOrFail($id);
        $gateway_info = json_decode($gateway->data);
        $amount = (float) $request->amount;
        $currency = $request->currency;

        if ($gateway->deposit_min > $amount) {
            $err='Cannot Be less than '. $gateway->deposit_min;
            $error['errors']['err']=$err;
            return response()->json($error,401); 
        }
        
        if ($gateway->deposit_max < $amount) {
            $err= 'Cannot be greater than '.$gateway->deposit_max;
            $error['errors']['err']=$err;
            return response()->json($error,401); 
        }

        $type = $request->currency ? 'manual' : $gateway->name;
        // $charge = $gateway->rate;
        if (!empty($gateway_info )) {
            foreach ($gateway_info as $key => $info) {
                $cred[$key] = $info;
            };
            session(['credentials' => $cred]);
        }
        
        if ($gateway->charge_type == 'fixed') {
            $charge = $gateway->fix_charge;
            $total_amount = $amount + $gateway->fix_charge;
        }elseif ($gateway->charge_type == 'percentage') {
            $charge = (($amount / 100) * $gateway->percent_charge);
            // calculate percentage
            $total_amount = $amount + $charge;
        }elseif ($gateway->charge_type == 'both'){
            //If both: minus the charge then calculate the percentage 
            $charge = $gateway->fixed_charge;
            $charge += ($amount / 100) * $gateway->percent_charge;
            // calculate percentage
            $total_amount = $amount + $charge;
        }
        // $payable = $total_amount;
        // $usd_amount = $payable;
        session([
            'id' => $id,
            'type'=> $type,
            'amount' => $amount,
            'charge' => $charge,
            'payable' => $total_amount * $gateway->rate,
            'usd_amount' => $total_amount,
            'currency' => $currency ?? 0
        ]);
        
        return response()->json('Successful!');
        // return redirect()->route('user.edeposit.payment');
    }

    public function payment(Request $request){
        
        if (!$request->session()->has('amount')) {
            return abort(404); 
        }

        //re assign credentials in one $data array
        if ($request->session()->get('credentials')) {
            foreach ($request->session()->get('credentials') as $key => $value) {
                $data[$key] = $value;
            }
        }

        $data['id'] = $request->session()->get('id');

        $gateway = Getway::findOrFail($data['id']);
        $data['type'] = $request->session()->get('type');
        $data['amount'] = $request->session()->get('amount');
        $data['charge'] = $request->session()->get('charge');
        $data['payable'] = $request->session()->get('payable');
        $data['usd_amount'] = $request->session()->get('usd_amount');
        $data['final_amount'] = 0;
        
        if ($request->session()->get('currency')) {
            $currency_id = $request->session()->get('currency');
            $currency = Term::findOrFail($currency_id);
            $data['final_amount'] = $data['usd_amount'] * (float) $currency->slug;
            $data['currency'] = $currency;
        }
        
        $data = json_decode(json_encode($data), FALSE); //array to object
       
        return view('user.edeposit.payment', compact('data','gateway'));
    }

    public function deposit(Request $request){
        $transaction_status = 0;
        $gateway = Getway::findOrFail($request->id);
        if ($request->type == 0) {
            $request->validate([
                'comment'            => 'required',
                'image'            => 'required|image|max:1000'
            ]);
            // if manual getway           
            $transaction_status = 2;
            $status = 2;
            $amount = $request->session()->get('amount');
            $currency = Term::findOrFail($request->currency);
            $path = $name = '';

            if ($request->hasFile('image')) {
                $image      = $request->file('image');
                $name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                $path = 'uploads/' . date('y/m/');
                $image->move($path, $name);
            }

            $image = $path . $name;

            $deposit_info = [
                'currency' => $currency->title,
                'amount' => $amount * (float) $currency->slug,
                'rate' => $currency->slug,
                'image' => $image,
                'comment' => $request->comment
            ];
     
            $deposit_trx = Str::random(16);
            $transaction_info = 'Payment with '. $gateway->name;
            Session::flash('message', 'Transaction Successfully done!');
        }else{
            $payment_data['currency']='USD';
            $payment_data['email']=Auth::user()->email;
            $payment_data['name']=Auth::user()->name;
            $payment_data['phone']=Auth::user()->phone;
            $payment_data['billName']='Deposit';   
            $payment_data['amount'] = $request->session()->get('amount');
            $payment_data['charge'] = $request->session()->get('charge');
            $payment_data['pay_amount'] = $request->session()->get('usd_amount');
            $payment_data['getway_id'] = $gateway->id;
            $payment_data['payment_type']=1;

            if($gateway->id == 1){
                $payment_data['client_id']=$request->session()->get('credentials')['client_id'];
                $payment_data['client_secret']=$request->session()->get('credentials')['client_secret'];
                return Paypal::make_payment($payment_data);
            }
            if($gateway->id == 3){
                $payment_data['key_id']=$request->session()->get('credentials')['key_id'];
                $payment_data['key_secret']=$request->session()->get('credentials')['key_secret'];
                return Razorpay::make_payment($payment_data);
            }
            if($gateway->id == 4){
                $payment_data['x_api_key']=$request->session()->get('credentials')['x_api_key'];                
                $payment_data['x_auth_token']=$request->session()->get('credentials')['x_auth_token'];                
                $payment_data['pay_amount']= $request->session()->get('payable');                
                return Instamojo::make_payment($payment_data);
            }
            if($gateway->id == 5){
                $payment_data['user_secret_key']=$request->session()->get('credentials')['user_secret_key'];                
                $payment_data['cateogry_code']=$request->session()->get('credentials')['cateogry_code'];                
                $payment_data['pay_amount']= $request->session()->get('payable');                
                return Toyyibpay::make_payment($payment_data);
            }
            if($gateway->id == 6){
                $payment_data['api_key']=$request->session()->get('credentials')['api_key'];                                
                return Mollie::make_payment($payment_data);
            }
            if($gateway->id == 7){
                $payment_data['secret_key']=$request->session()->get('credentials')['secret_key'];                                
                $payment_data['public_key']=$request->session()->get('credentials')['public_key'];  
                $payment_data['pay_amount']= $request->session()->get('payable');                              
                return Paystack::make_payment($payment_data);
            }
            if($gateway->id == 15){
                $payment_data['public_key']=$request->session()->get('credentials')['public_key'];                                
                $payment_data['private_key']=$request->session()->get('credentials')['private_key'];  
                                           
                return Coinpaymentbtc::make_payment($payment_data);
            }

            if($gateway->id == 2){
                // if stripe 
                $stripe_secret_key = $request->session()->get('credentials')['secret_key'];
                $gateway = Omnipay::create('Stripe');
                $gateway->setApiKey($stripe_secret_key);
                $status = 1;
                if ($request->stripeToken) {
                    $token = $request->stripeToken;
                    $response = $gateway->purchase([
                        'amount' => $request->session()->get('usd_amount'),
                        'currency' => 'USD',
                        'token' => $token,
                    ])->send();
                
                    if ($response->isSuccessful()) {
                        $arr_payment_data = $response->getData();
                        $payment_id = $arr_payment_data['id'];
                        $amount = $request->session()->get('amount');
                        $transaction_status = 1;
                        $deposit_trx = $payment_id;
                        $transaction_info = ' stripe';
                    } else {
                        $transaction_status = 0;
                        Session::flash('message', 'Transaction Error!');
                    }
                }
            }
       }

       
       if ($transaction_status == 1) { 
        //if transaction successfull
        $user = User::findOrFail(Auth::id());
        //Calculate new balance
        $new_balance = $user->balance = $user->balance + $request->session()->get('amount');

        //Balance update on user table
        $user->save();

        // Insert transaction data into deposit table   
        $deposit = new Deposit();
        $deposit->trx = $deposit_trx;
        $deposit->user_id = $user->id;
        $deposit->getway_id = $request->session()->get('id');
        $deposit->type = $request->session()->get('type');
        $deposit->amount = $amount;
        $deposit->charge = $request->session()->get('charge');
        $deposit->status = $status;   
        $deposit->save();

        // Insert transaction data into transaction table
        $transaction = new Transaction();
        $transaction->user_id = $user->id;
        $transaction->trxid = Str::random(16);
        $transaction->amount = $amount;
        $transaction->balance = $new_balance;
        $transaction->fee = $request->session()->get('charge');
        $transaction->status = 1;
        $transaction->info = $transaction_info;
        $transaction->type = 'edeposit';
        $transaction->save();

      
        Session::flash('message', 'Transaction Successfully done!');
    }
    else{
          $user = User::findOrFail(Auth::id());
          // Insert transaction data into deposit table   
          $deposit = new Deposit();
          $deposit->trx = $deposit_trx;
          $deposit->user_id = $user->id;
          $deposit->getway_id = $request->session()->get('id');
          $deposit->type = $request->session()->get('type');
          $deposit->amount = $amount;
          $deposit->charge = $request->session()->get('charge');
          $deposit->status = $status;   
          $deposit->save();
  
          
  
          if ($request->type == 0) {
              $deposit_meta = new Depositmeta();
              $deposit_meta->deposit_id = $deposit->id;
              $deposit_meta->key = 'deposit_info';
              $deposit_meta->value = json_encode($deposit_info);
              $deposit_meta->save();
          }
  
          Session::flash('message', 'Transaction Successfully done!');    
    }
    return redirect()->route('user.edeposit.history');
        
    }

    public function payment_success(){
      
        if(!Session::has('payment_info')){
            return abort(404);
        }

          $payment_info = Session::get('payment_info');
          //if transaction successfull
          $user = User::findOrFail(Auth::id());
          //Calculate new balance
          $new_balance = $user->balance = $user->balance + (float)$payment_info['amount'];
  
          //Balance update on user table
          $user->save();

          // Insert transaction data into deposit table   
          $deposit = new Deposit();
          $deposit->trx = $payment_info['payment_id'];
          $deposit->user_id = $user->id;
          $deposit->getway_id = $payment_info['getway_id'];
          $deposit->type = $payment_info['payment_type'];
          $deposit->amount = $payment_info['amount'];
          $deposit->charge = $payment_info['charge'];
          $deposit->status = $payment_info['status'];   
          $deposit->save();

          // Insert transaction data into transaction table
          $transaction = new Transaction();
          $transaction->user_id = $user->id;
          $transaction->trxid = Str::random(16);
          $transaction->amount = $payment_info['amount'];
          $transaction->balance = $new_balance;
          $transaction->fee =  $payment_info['charge'];
          $transaction->status = 1;
          $transaction->info = 'Deposit with '.$payment_info['payment_method'];
          $transaction->type = 'edeposit';
          $transaction->save();

        //   if ($request->type == 0) {
        //       $deposit_meta = new Depositmeta();
        //       $deposit_meta->deposit_id = $deposit->id;
        //       $deposit_meta->key = 'deposit_info';
        //       $deposit_meta->value = json_encode($deposit_info);
        //       $deposit_meta->save();
        //   }

        Session::forget('payment_info');
        Session::flash('message', 'Transaction Successfully done!');
        return redirect()->route('user.edeposit.history');
    }


    public function history(){
        $deposits = Deposit::with('getway')->where('user_id', Auth::id())->latest()->paginate(10);
        return view('user.edeposit.history', compact('deposits'))->with('i', 1);
    }

    public function payment_fail()
    {
        Session::forget('payment_info');
        Session::flash('error', 'Transaction Failed!');
        return redirect()->route('user.edeposit.history');
    }
}
