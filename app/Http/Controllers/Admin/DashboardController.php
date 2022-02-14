<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banktransection;
use App\Models\Deposit;
use App\Models\Fdrtransaction;
use App\Models\Loan;
use App\Models\Payment;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Withdraw;
use App\Models\Support;
use Illuminate\Http\Request;
use Auth;
class DashboardController extends Controller
{
    // Admin Dashboard 
    public function index()
    {
    	if (!Auth()->user()->can('dashboard.index')) {
           return abort(401);
        }
        return view('admin.dashboard');
    }

    public function statistics(){
        //users
        $total_user =  User::where('role_id', 2)->count();
        $active = User::where('role_id', 2)->where('status', 1)->count();
        $mail_verified = User::where('email_verified_at', '!=', null)->where('status', 1)->count();
        $phone_verified = User::where('phone_verified_at', '!=', null)->where('status', 1)->count();

        //Users Finance Statistics
        $deposit = Deposit::where('status', 1)->sum('amount');

        //Fix Deposit Statistics
        $fixed_deposit_number = Fdrtransaction::count();
        $fixed_deposit_pending = Fdrtransaction::where('status', 2)->count();
        $fixed_deposit_complete = Fdrtransaction::where('status', 1)->count();
        $fixed_deposit_cancelled = Fdrtransaction::where('status', 0)->count();
        $fixed_deposit_total_amount = Fdrtransaction::sum('amount');
        $fixed_deposit_total_return = Fdrtransaction::sum('return_total');
        $fixed_deposit_total_interest = $fixed_deposit_total_return - $fixed_deposit_total_amount;

        //Loans Statistics
        $loan_pending = Loan::where('status', 2)->count();
        $loan_queue = Loan::where('status', 1)->count();
        $loan_amount_given = Loan::where('status', 1)->sum('amount');
        $loan_amount_complete = Loan::where('status', 3)->sum('amount');

        //deposit Statistics
        $total_deposit_number = Deposit::where('status', 1)->count();
        $total_deposit_amount = Deposit::where('status', 1)->sum('amount');
        $total_deposit_charge = Deposit::where('status', 1)->sum('charge');

        

        // Other Bank Transaction Statistics
        $other_bank_total_number = Banktransection::count();
        $other_bank_approved = Banktransection::where('status', 1)->count();
        $other_bank_rejected = Banktransection::where('status', 0)->count();
        $other_bank_pending = Banktransection::where('status', 2)->count();
        $other_bank_amount = Transaction::where([
            ['type','otherbank_transfer'],
            ['status',1],
        ])->sum('amount');

        $other_bank_charge = Transaction::where([
            ['type','otherbank_transfer'],
            ['status',1],
        ])->sum('fee');

        //Withdraw Statistics
        $debit = Transaction::where('status', 1)->where('type','otherbank_transfer')->orWhere('type', 'ownbank_transfer_debit')->sum('amount');

        $withdraw_total = Withdraw::where('status',1)->sum('amount_usd') + $debit;
        $withdraw_approved = Withdraw::where('status',1)->count();
        $withdraw_pending = Withdraw::where('status',2)->count();
        $withdraw_reject = Withdraw::where('status',0)->count();
        $withdraw_charge = Withdraw::where('status',1)->sum('fee');
   

        //Billing Statistics
        $bill_total = Payment::where('status', 1)->sum('amount');
        $bill_pending = Payment::where('status', 2)->count();
        $bill_complete = Payment::where('status', 1)->count();

        //pening issue;
        $pending_support=Support::where('status',2)->count();
        $total_pening_withdraw=$other_bank_pending+$withdraw_pending;
        $pending_deposit=Deposit::where('status',2)->count();
        $total_issues=$pending_support+$total_pening_withdraw+$pending_deposit;

        $deposit_transactions=Deposit::whereYear('created_at', '=',date('Y'))->where('status',1)->orderBy('id', 'asc')->selectRaw('year(created_at) year, monthname(created_at) month, sum(amount) amount')
                ->groupBy('year', 'month')
                ->get();
        $deposit_sum=Deposit::whereYear('created_at', '=',date('Y'))->where('status',1)->sum('amount');        
        $all_transaction=Transaction::whereYear('created_at', '=',date('Y'))->whereYear('created_at', '=',date('Y'))->orderBy('id', 'asc')->selectRaw('year(created_at) year, monthname(created_at) month, count(*) transaction')
                ->groupBy('year', 'month')
                ->get();
        $all_transaction_count=Transaction::whereYear('created_at', '=',date('Y'))->count();               

        $data = [
            'user' => [
                'total' => $total_user,
                'active' => $active,
                'mail_verified' => $mail_verified,
                'phone_verified' => $phone_verified,
            ],
            'deposits' =>[
                'deposit' => number_format($deposit,2)
            ],
            'fixed_deposit' => [
                'number_of_deposit' => number_format($fixed_deposit_number),
                'queue' => number_format($fixed_deposit_pending),
                'complete' => number_format($fixed_deposit_complete),
                'cancelled' => number_format($fixed_deposit_cancelled),
                'total_amount' => number_format($fixed_deposit_total_amount,2),
                'total_return' => number_format($fixed_deposit_total_return,2),
                'total_interest' => number_format($fixed_deposit_total_interest,2),
            ],
            'loan' => [
                'pending' => number_format($loan_pending),
                'queue' => number_format($loan_queue),
                'given' => number_format($loan_amount_given),
                'complete' => number_format($loan_amount_complete),
            ],
            'deposit' =>[
                'number' => number_format($total_deposit_number),
                'amount' => number_format($total_deposit_amount,2),
                'charge' => number_format($total_deposit_charge,2)
            ],
            'other_bank' => [
                'total_number' => number_format($other_bank_total_number),
                'approved' => number_format($other_bank_approved),
                'reject' => number_format($other_bank_rejected),
                'pending' => number_format($other_bank_pending),
                'amount' => number_format($other_bank_amount,2),
                'charge' => number_format($other_bank_charge,2),
            ],
            'withdraw' => [
                'total' => number_format($withdraw_total,2),
                'approved' => number_format($withdraw_approved),
                'pending' => number_format($withdraw_pending),
                'reject' => number_format($withdraw_reject),
                'charge' => number_format($withdraw_charge),
            ],
            'bill' => [
                'total' => number_format($bill_total,2),
                'pending' => number_format($bill_pending),
                'complete' => number_format($bill_complete),
            ],
            'statics'=>[
                'pending_support'=>number_format($pending_support),
                'total_pening_withdraw'=>number_format($total_pening_withdraw),
                'pending_deposit'=>number_format($pending_deposit),
                'total_issues'=>number_format($total_issues),
            ],
            'transactions'=>[
                'deposit_transactions'=>$deposit_transactions,
                'deposit_sum'=>number_format($deposit_sum,2),
                'all_transaction'=>$all_transaction,
                'all_transaction_count'=>$all_transaction_count,
            ]
    

            
        ];
        return json_encode($data);
    }
}
