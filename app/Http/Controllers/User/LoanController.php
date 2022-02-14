<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use App\Models\Loanplan;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\str;

class LoanController extends Controller
{
    // User Loan Package
    public function loanPackage()
    {
        $loan_pacgages = Loanplan::where('status', 1)->paginate(20);
        return view('user.loan.loan_package', compact('loan_pacgages'));
    }




    // User Loan Package Request
    public function loanPackageStore(Request $request, $id)
    {
        // checking
        $loan_plan = Loanplan::where('id', $id)->first();

        if ($loan_plan->min_amount > $request->amount) {
            $err='Cannot Be less than '. $loan_plan->min_amount;
            $error['errors']['err']=$err;
            return response()->json($error,401); 
        }

        if ($loan_plan->max_amount < $request->amount) {
            $err='Cannot be greater than '. $loan_plan->max_amount;
            $error['errors']['err']=$err;
            return response()->json($error,401); 
        }

        // Store
        $loan_plan_store              = new Loan();
        $loan_plan_store->user_id     = Auth::user()->id;
        $loan_plan_store->loanplan_id = $id;
        $loan_plan_store->days        = $loan_plan->duration;
        if ($loan_plan->charge_type == 'fixed') {
            $loan_plan_store->charge = $loan_plan->fixed_charged;
            $loan_plan_store->amount = $request->amount;
        }
        if ($loan_plan->charge_type == 'percentage') {
            $percent                 = $request->amount * $loan_plan->percent_charged / 100;
            $loan_plan_store->charge = $percent;
            $loan_plan_store->amount = $request->amount;
        }
        if ($loan_plan->charge_type == 'both') {
            $amount                  = $request->amount - $loan_plan->fixed_charged;
            $percent                 = $amount * $loan_plan->percent_charged / 100;
            $loan_plan_store->charge = $percent;
            $loan_plan_store->amount = $request->amount;
        }
        $loan_plan_store->status = 2;
        $loan_plan_store->save();

        return response()->json('Loan Request Send Successfully');

    }

    // Loan History
    public function loanHistory()
    {
        $user_id      = Auth::user()->id;
        $loan_history = Loan::where('user_id', $user_id)->latest()->paginate(20);
        return view('user.loan.loan_history', compact('loan_history'));
    }


    // Loan Return
    public function loanReturn($id)
    {
        $loan_return  = Loan::where('user_id',Auth::id())->where('status', 1)->findorFail($id);
        $total_cost   = $loan_return->amount + $loan_return->charge;
        $main_balance = $loan_return->user->balance;
        
        // Balance check
        if ($main_balance < $total_cost) {
            return redirect()->back()->with('error', 'Insuffence Balance');
        }
        // Loan status change
        $loan_return->status = 3;
        $loan_return->save();
        
        // Loan Back
        $loan_back          = User::where('id', $loan_return->user_id)->first();
        $loan_back->balance = $loan_back->balance - $total_cost;
        $loan_back->save();

        // Transaction
        $transactions          = new Transaction();
        $transactions->user_id = $loan_back->id;
        $transactions->trxid   = Str::random(10);
        $transactions->amount  = $total_cost;
        $transactions->balance = $loan_back->balance;
        $transactions->fee     = 0;
        $transactions->status  = '1';
        $transactions->info    = 'Loan Return';
        $transactions->type    = 'loan Return';
        $transactions->save();
        return redirect()->back()->with('success', 'Loan Return Successfully');

    }
}
