<?php

namespace App\Http\Controllers;

use App\Mail\OtpMail;
use App\Models\Account;
use App\Models\Debits;
use App\Models\Deposit;
use App\Models\MoneyTransfer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Jenssegers\Agent\Agent;
use Symfony\Component\Mailer\Messenger\SendEmailMessage;

class AccountController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function new_transfers()
    {
        $user = Auth::user();
        $account = Account::where('user_id', $user->id)->first();
        return view('users.transfer', compact('account', 'user'));
    }
    public function codes()
    {
        $user = Auth::user();
        $account = Account::where('user_id', $user->id)->first();
        return view('admin.account.codes', compact('account', 'user'));
    }
    public function ViewCodes()
    {
        $user = Auth::user();
        $account = Account::where('user_id', $user->id)->first();
        return view('admin.account.ViewCodes', compact('account', 'user'));
    }

    public function addcodes()
    {
        $account = Account::find(request('account_id'));
        $account->otp1 = request('otp1');
        $account->otp2 = request('otp2');
        $account->otp3 = request('otp3');
        $account->save();
        return redirect()->route('admin.account.index')->with('success', 'Codes added successfully');
    }
    //
    public function index()
    {
        $accounts = Account::with('user')->paginate(10);
        return view('admin.account.index', compact('accounts'));
    }

    public function create()
    {
        return view('admin.account.create');
    }

    public function edit($id)
    {
        $account = Account::with('user')->findOrFail($id);
        return view('admin.account.edit', compact('account'));
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->country = $request->country;
        $user->city = $request->city;
        $user->postal_code = $request->postal_code;
        $user->username = $request->username;
        $user->role = 'user';
        $user->save();

        $account = new Account();
        $account->user_id = $user->id;
        $account->user_id = $user->id;
        $account->account_number = $request->account_number;
        $account->account_type = $request->account_type;
        $account->balance = '0';
        $account->currency = $request->currency;
        $account->bank_identifier = '00962';
        $account->IBAN_Check_digits = '88';
        $account->iso = 'CH';
        $account->IBAN = 'CH8800962' . $request->account_number;
        $account->save();

        return redirect()->route('admin.account.index')->with('success', 'Account created successfully');
    }
    public function update(Request $request, $id)
    {
        $account = Account::find($id);
        $account->user_id = $request->user_id;
        $account->account_number = $request->account_number;
        $account->account_type = $request->account_type;
        $account->balance = $request->balance;
        $account->currency = $request->currency;
        $account->bank_identifier = $request->bank_identifier;
        $account->IBAN_Check_digits = $request->IBAN_Check_digits;
        $account->iso = $request->iso;
        $account->IBAN = $request->IBAN;
        $account->save();

        return redirect()->route('admin.account.index')->with('success', 'Account updated successfully');
    }

    public function destroy($id)
    {
        $account = Account::find($id);
        $account->delete();
        $user = User::find($account->user_id);
        $user->delete();
        return redirect()->route('admin.account.index')->with('success', 'Account deleted successfully');
    }
    public function credit($id)
    {
        $account = Account::find($id);
        $user = User::find($account->user_id);
        return view('admin.account.credit', compact('user', 'account'));
    }
    public function debit($id)
    {
        $account = Account::find($id);
        $user = User::find($account->user_id);
        return view('admin.account.debit', compact('user', 'account'));
    }
    public function adddebit(Request $request)
    {
        $account = Account::find($request->account_id);
        $account->balance = $account->balance - $request->amount;
        $account->save();
        $debit = new Debits();
        $debit->account_id = $request->account_id;
        $debit->user_id = $account->user_id;
        $debit->amount = $request->amount;
        $debit->save();
        return redirect()->route('admin.account.index')->with('success', 'Amount debited successfully');
    }

    public function addcredit(Request $request)
    {
        $account = Account::find($request->account_id);
        $account->balance = $account->balance + $request->amount;
        $account->save();
        $debit = new Deposit();
        $debit->account_id = $request->account_id;
        $debit->user_id = $account->user_id;
        $debit->amount = $request->amount;
        $debit->save();
        return redirect()->route('admin.account.index')->with('success', 'Amount debited successfully');
    }

    public function home()
    {
        $user = Auth::user();
        $account = Account::where('user_id', $user->id)->first();
        $transactions = Debits::where('user_id', $user->id)->paginate(3);
        $credits = Deposit::where('user_id', $user->id)->paginate(3);
        return view('users.home', compact('user', 'account', 'transactions', 'credits'));
    }
    public function activity()
    {
        if (config('session.driver') !== 'database') {
            return collect();
        }

        $sessions =  (DB::connection(config('session.connection'))->table(config('session.table', 'sessions'))
            ->where('user_id', Auth::user()->getAuthIdentifier())
            ->orderBy('last_activity', 'desc')
            ->get()
        )->map(function ($session) {
            return (object) [
                'agent' => $this->createAgent($session),
                'ip_address' => $session->ip_address,
                'is_current_device' => $session->id === request()->session()->getId(),
                'last_active' => Carbon::createFromTimestamp($session->last_activity)->diffForHumans(),
            ];
        });
        return view('users.activity', compact('sessions'));
    }
    public function profile()
    {
        $user = Auth::user();
        return view('users.profile', compact('user'));
    }
    public function security()
    {
        $user = Auth::user();
        return view('users.secuirty', compact('user'));
    }
    public function deposit()
    {
        $user = Auth::user();
        $account = Account::where('user_id', $user->id)->first();
        $deposit = Deposit::where('user_id', $user->id)->paginate(10);
        return view('users.deposit', compact('user', 'account', 'deposit'));
    }
    public function debits()
    {
        $user = Auth::user();
        $account = Account::where('user_id', $user->id)->first();
        $moneyTransfer = Debits::where('user_id', $user->id)->paginate(10);
        return view('users.debit', compact('user', 'account', 'moneyTransfer'));
    }
    public function transfers()
    {
        $user = Auth::user();
        $account = Account::where('user_id', $user->id)->first();
        $moneyTransfer = MoneyTransfer::where('user_id', $user->id)->paginate(10);
        return view('users.moneyTransfer', compact('user', 'account', 'moneyTransfer'));
    }
    public function transactions()
    {
        $user = Auth::user();
        $account = Account::where('user_id', $user->id)->first();
        $transactions = Debits::where('user_id', $user->id)->paginate(10);
        return view('users.transactions', compact('user', 'account', 'transactions'));
    }
    public function twofa()
    {
        $user = Auth::user();
        return view('auth.setTwoFactor', compact('user'));
    }
    protected function createAgent($session)
    {
        return tap(new Agent, function ($agent) use ($session) {
            $agent->setUserAgent($session->user_agent);
        });
    }

    public function Addtransfer(Request $request)
    {
        if ($request->transferamount > Auth::user()->account->balance) {
            return redirect()->back()->with('error', 'Insufficient Balance');
        }
        $user = Auth::user();
        $account = Account::find($user->account->id);
        $moneyTransfer = new MoneyTransfer();
        $moneyTransfer->account_id = $account->id;
        $moneyTransfer->user_id = $account->user_id;
        $moneyTransfer->recepient_name = $request->recepient_name;
        $moneyTransfer->recepient_account_number = $request->recepient_account_number;
        $moneyTransfer->transaction_reference = "BCPN" .  random_int(100000, 999999) . "- TRN";
        $moneyTransfer->recepient_account_bank = $request->recepient_account_bank;
        $moneyTransfer->recepient_swift = $request->recepient_swift;
        $moneyTransfer->recepient_country = $request->country;
        $moneyTransfer->amount = $request->transferamount + 500;
        $moneyTransfer->currency = 'USD';
        $moneyTransfer->status = 'initiated';
        $moneyTransfer->save();

        return view('users.otp1', compact('user', 'account', 'moneyTransfer'));
    }
    public function otp1(Request $request)
    {
        $user = Auth::user();
        $account = Account::find($user->account->id);
        $moneyTransfer = MoneyTransfer::find($request->moneyTransfer_id);
        if ($account->otp1 == $request->otp) {
            return view('users.otp2', compact('user', 'account', 'moneyTransfer'));
        } else {
            $moneyTransfer->status = 'failed';
            $moneyTransfer->save();
            return redirect()->route('Account_transfers_new')->with('error', 'Invalid OTP 1');
        }
    }
    public function otp2(Request $request)
    {
        $user = Auth::user();
        $account = Account::find($user->account->id);
        $moneyTransfer = MoneyTransfer::find($request->moneyTransfer_id);
        if ($account->otp2 == $request->otp) {
            return view('users.otp3', compact('user', 'account', 'moneyTransfer'));
        } else {
            $moneyTransfer->status = 'failed';
            $moneyTransfer->save();
            return redirect()->route('Account_transfers_new')->with('error', 'Invalid OTP 2');
        }
    }
    public function otp3(Request $request)
    {
        $user = Auth::user();
        $account = Account::find($user->account->id);
        $moneyTransfer = MoneyTransfer::find($request->moneyTransfer_id);
        if ($account->otp3 == $request->otp) {
            $otp = rand(1000, 9999);
            $account->emailotp = $otp;
            $account->update();
            $mailData = [
                'title' => 'You initiated a transfer',
                'body' => 'Your OTP is : ' . $otp
            ];
            Mail::to($user->email)->send(new OtpMail($mailData));
            return view('users.email', compact('user', 'account', 'moneyTransfer'));
        } else {
            $moneyTransfer->status = 'failed';
            $moneyTransfer->save();
            return redirect()->route('Account_transfers_new')->with('error', 'Invalid OTP 3');
        }
    }
    public function emailotp(Request $request)
    {
        $user = Auth::user();
        $account = Account::find($user->account->id);
        $moneyTransfer = MoneyTransfer::find($request->moneyTransfer_id);
        if ($account->emailotp == $request->otp) {
            if ($account->disableTransfer == 1) {
                $moneyTransfer->status = 'failed';
                $moneyTransfer->save();
                return redirect()->route('Account_transfers_new')->with('error', 'Your Account is disabled for transfer');
            }
            return redirect()->route('users.transfer.confirm', $moneyTransfer->id);
        } else {
            $moneyTransfer->status = 'failed';
            $moneyTransfer->save();
            return redirect()->route('Account_transfers_new')->with('error', 'Invalid Email Passcode');
        }
    }
    public function transferConfirm($id)
    {
        $moneyTransfer = MoneyTransfer::find($id);
        $moneyTransfer->status = 'pending';
        $moneyTransfer->save();
        $user = Auth::user();
        $account = Account::find($user->account->id);
        $account->balance = $account->balance - $moneyTransfer->amount;
        $account->save();
        $debit = new Debits();
        $debit->account_id = $account->id;
        $debit->user_id = $account->user_id;
        $debit->amount = $moneyTransfer->amount;
        $debit->save();
        return view('users.transferConfirm', compact('user', 'account', 'moneyTransfer'));
    }
    public function disable($id)
    {
        $account = Account::find($id);
        $account->disableTransfer = 1;
        $account->save();
        return redirect()->route('admin.account.index')->with('success', 'Transfer has been disabled');
    }
    public function enableTransfer($id)
    {
        $account = Account::find($id);
        $account->disableTransfer = 0;
        $account->save();
        return redirect()->route('admin.account.index')->with('success', 'Transfer has been enabled');
    }
    public function loans()
    {
        $user = Auth::user();
        $account = Account::find($user->account->id);
        return view('users.loans', compact('user', 'account'));
    }
    public function loans_add()
    {
        $user = Auth::user();
        $account = Account::find($user->account->id);
        return view('users.loansAdd', compact('user', 'account'));
    }
    public function admin_transfers(){
        $user = Auth::user();
        $account = Account::find($user->account->id);
        $moneyTransfers = MoneyTransfer::paginate(10);
        return view('admin.transfer.index', compact('user', 'account', 'moneyTransfers'));
    }
}
