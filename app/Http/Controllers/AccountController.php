<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Jenssegers\Agent\Agent;

class AccountController extends Controller
{
    //
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

        $sessions =  (
            DB::connection(config('session.connection'))->table(config('session.table', 'sessions'))
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
    protected function createAgent($session)
    {
        return tap(new Agent, function ($agent) use ($session) {
            $agent->setUserAgent($session->user_agent);
        });
    }
}
