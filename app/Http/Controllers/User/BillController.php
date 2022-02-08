<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmailJob;
use App\Mail\BillRequestMail;
use App\Mail\TransferOTPMail;
use App\Models\Option;
use App\Models\Payment;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::with(['sender','receiver'])->where('sender_id', Auth::id())->orWhere('receiver_id', Auth::id())->latest()->paginate(10);
        return view('user.bill.index', compact('payments'))->with('i', 1);
    }

    public function billRequests()
    {
        $payments = Payment::where('status', 2)->with(['sender','receiver'])
        ->where(function ($query){
            $query->where('sender_id', Auth::id())->orWhere('receiver_id', Auth::id());
        })
        ->latest()->paginate(10);
        return view('user.bill.requests', compact('payments'))->with('i', 1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.bill.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|max:100',
            'email'       => 'required|email',
            'description' => 'required|max:250',
        ]);

        $receiver = User::where([
            ['email', $request->email],
            ['id','!=', Auth::id()],
        ])->first(['id', 'name']);
        
        //check if account exists
        if ($receiver == null) {
            return redirect()->back()->with('error', "Invalid email!")->withInput();
        }

        $bill = new Payment();
        $bill->sender_id = Auth::id();
        $bill->receiver_id = $receiver->id;
        $bill->title = $request->title;
        $bill->description = $request->description;
        $bill->amount = $request->amount;
        $bill->status = 2; //pending
        $bill->save();   

        $data = [
            'type' => 'bill',
            'email' => $request->email,
            'name' => $receiver->name,
            'message' => Auth::user()->name. ' sent you a bill request of : '. $request->amount . ' USD. Please check your Bill Requests!'
        ];

        if (env('QUEUE_MAIL') == 'on') {
            dispatch(new SendEmailJob($data));
        }else{
            Mail::to($request->email)->send(new BillRequestMail($data)); 
        }

        

        return redirect()->route('user.bill.index')->with('message', "Bill Request Sent Successfully to ". $request->email);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
       $payment = Payment::with(['sender','receiver'])->findOrFail($id);
       if ($payment->receiver_id != Auth::id()) {
           return abort(401);
       }
       return view('user.bill.show', compact('payment'));
    }

    public function billSendOTP($id, Request $request){
        $payment = Payment::findOrFail($id);
        
        //Request Receiver and money sender
        $receiver = User::findOrFail($payment->receiver_id);

        //Money Sender Balance Check
        if ($receiver->balance == 0 || $receiver->balance == '') {
            return redirect()->route('user.bill.index')->with('message', 'Sender Dont have anough balance!!');
        }

        if ($request->session()->get('bill_status')) {
            $user = User::findOrFail(Auth::id());

            $data = [
                'type' => 'bill_otp',
                'email' => $user->email,
                'name' => $user->name,
                'otp' => $request->session()->get('billOTP'),
                'transfer_type' => 'Bill Pay'
            ];
            if (env('QUEUE_MAIL') == 'on') {
                dispatch(new SendEmailJob($data));
            }else{
                Mail::to($user->email)->send(new TransferOTPMail($data));
            }
           
            
            return redirect()->route('user.bill.otpresend', $id);
        }else{
            if (!$request->session()->get('otp_err') && $request->isMethod('post')) {
                if ($request->status == 0) {
                    $payment = Payment::findOrFail($id);
                    $payment->status = $request->status;
                    $payment->save();
                    return redirect()->route('user.bill.index')->with('message','Request rejected!');
                }
                $otp = rand(2000,9999);

                session([
                    'billOTP' => $otp,
                    'bill_status' => $request->status,
                ]);
    
                $user = User::findOrFail(Auth::id());
                
                $data = [
                    'name' => $user->name,
                    'otp' => $otp,
                    'transfer_type' => 'Bill Pay',
                    'type' => 'bill_otp',
                    'email' => $user->email,
                ];

                if (env('QUEUE_MAIL') == 'on') {
                    dispatch(new SendEmailJob($data));
                }else{
                    Mail::to($user->email)->send(new TransferOTPMail($data));
                }
               
    
                
                Session::put('message', 'Check your mail for OTP!'); 
                return redirect()->route('user.bill.otpresend', $id);
            }
        }
       
    }

    public function billResendOTP($id, Request $request){
        return view('user.bill.otpconfirm', compact('id'));
    }
    
    public function billpayment($id, Request $request){
        if ($request->otp != $request->session()->get('billOTP')) {
            return redirect()->route('user.bill.otpconfirm', $id)->with('otp_err', "OTP not matched");
        }

        $payment = Payment::findOrFail($id);
        $charge = Option::where('key', 'bill_charge')->pluck('value')->first();
        $charge = json_decode($charge);
        $amount = (double) $payment->amount;
        
        // if ($charge->charge_type == 'percentage') {
        
        // }
        //Request Receiver and money sender
        //Charge for sending money
        $sender_charge = ($amount / 100) * (float) $charge->sender_charge;
        $sender_amount =  $amount + $sender_charge;

        //Request Sender and money receiver
        //Charge for receiving money
        $receiver_charge = ($amount / 100) * (float) $charge->receiver_charge;
        $receiver_amount =  $amount - $receiver_charge;
        
        //Request Sender and money receiver
        $sender = User::findOrFail($payment->sender_id);
        $sender->balance = $sender->balance + $receiver_amount;  //Money Reciever
        $sender->save();

        //Request Receiver and money sender
        $receiver = User::findOrFail($payment->receiver_id);

        //Money Sender Balance Check
        if ($receiver->balance == 0 || $receiver->balance == '') {
            return redirect()->route('user.bill.index')->with('message', 'Sender Dont have anough balance!!');
        }

        $receiver->balance = $receiver->balance - $sender_amount; //Money Sender
        $receiver->save();

        //FOR MONEY SENDER && REQUEST RECIEVER
        $transaction_money_sender = new Transaction();
        $transaction_money_sender->user_id = $receiver->id; //Money Sender
        $transaction_money_sender->trxid = Str::random(16);
        $transaction_money_sender->amount = $amount;
        $transaction_money_sender->balance = $receiver->balance;
        $transaction_money_sender->fee = $sender_charge;
        $transaction_money_sender->status = 1;
        $transaction_money_sender->info = 'Bill Payment from ' . $receiver->name . ' To '. $sender->name;
        $transaction_money_sender->type = 'bill_debit';
        $transaction_money_sender->save();

        //FOR MONEY RECEIVER && REQUEST SENDER
        $transaction_money_receiver = new Transaction();
        $transaction_money_receiver->user_id = $sender->id; //Money Reciever
        $transaction_money_receiver->trxid = Str::random(16);
        $transaction_money_receiver->amount = $amount;
        $transaction_money_receiver->balance = $sender->balance;
        $transaction_money_receiver->fee = $receiver_charge;
        $transaction_money_receiver->status = 1;
        $transaction_money_receiver->info = 'Bill Payment from ' . $receiver->name . ' To '. $sender->name;
        $transaction_money_receiver->type = 'bill_credit';
        $transaction_money_receiver->save();

        $payment->status = 1;
        $payment->save();

        Session::forget('bill_status');
        return redirect()->route('user.bill.index')->with('message', 'Request Accepted! Transaction Successfull!');;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
