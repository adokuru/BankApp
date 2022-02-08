<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Fdrplan;
use App\Models\Fdrtransaction;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\str;

class DepositController extends Controller
{
    // Defosit Package
    public function fixedDepositPackage()
    {
        $fdr_plans = Fdrplan::where('status', 1)->paginate(20);
        return view('user.deposit.fixed_deposit_package', compact('fdr_plans'));
    }

    // Defosit Request
    public function fixedDepositRequest(Request $request, $id)
    {
        // checking
        $fdr_plan = Fdrplan::where('id', $id)->first();
        
        if ($fdr_plan->min_amount > $request->amount) {
            $err='Cannot Be less than '. $fdr_plan->min_amount;
            $error['errors']['err']=$err;
            return response()->json($error,401); 
        }

        if ($fdr_plan->max_amount < $request->amount) {
            $err='Cannot be greater than '. $fdr_plan->max_amount;
            $error['errors']['err']=$err;
            return response()->json($error,401); 
        }

        // User Ballance Checking
        $user_balance = Auth::user()->balance;
        if ($user_balance < $request->amount) {
            $err='Insuffence Balance ';
            $error['errors']['err']=$err;
            return response()->json($error,401); 
        }
        
        // Deposit Store
        $percent_amount                = $request->amount * $fdr_plan->percent_return / 100;
        $deposit_store                 = new Fdrtransaction();
        $deposit_store->user_id        = Auth::user()->id;
        $deposit_store->fdrplan_id     = $id;
        $deposit_store->amount         = $request->amount;
        $deposit_store->return_percent = $fdr_plan->percent_return;
        $deposit_store->return_total   = $request->amount + $percent_amount;
        $deposit_store->return_date    = \Carbon\Carbon::now()->addDays(($fdr_plan->duration - 1))->format('Y-m-d');
        $deposit_store->status         = 2;
        $deposit_store->save();

        // User Balance Add
        $user                  = Auth::user()->id;
        $user_balance          = User::where('id', $user)->first();
        // $user_balance->amount  = $request->amount;
        $user_balance->balance = $user_balance->balance - $request->amount;
        $user_balance->save();

        // Transaction
        $transactions          = new Transaction();
        $transactions->user_id = $user;
        $transactions->trxid   = Str::random(10);
        $transactions->amount  = $request->amount;
        $transactions->balance = $user_balance->balance;
        $transactions->fee     = 0;
        $transactions->status  = '1';
        $transactions->info    = 'Fixed Deposit';
        $transactions->type    = 'fixed_deposit';
        $transactions->save();
        return response()->json('Thanks! Deposit Successfull');
    }

    // Fixed Deposit History
    public function fixedDepositHistory()
    {
        $user_id     = Auth::user()->id;
        $fdr_history = Fdrtransaction::where('user_id', $user_id)->latest()->paginate(20);
        return view('user.deposit.fixed_deposit_history', compact('fdr_history'));
    }
}
