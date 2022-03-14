<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Jenssegers\Agent\Agent;

class AccountController extends Controller
{
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

    public function home()
    {
        $user = Auth::user();
        $account = Account::where('user_id', $user->id)->first();
        return view('users.home', compact('user', 'account'));
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
        return view('users.deposit', compact('user', 'account'));
    }
    public function transfers()
    {
        $user = Auth::user();
        $account = Account::where('user_id', $user->id)->first();
        return view('users.transfers', compact('user', 'account'));
    }
    public function transactions()
    {
        $user = Auth::user();
        $account = Account::where('user_id', $user->id)->first();
        return view('users.transactions', compact('user', 'account'));
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
}
