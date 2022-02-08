<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banktransection;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function create()
    {
        if (!Auth()->user()->can('transaction')) {
           return abort(401);
        }
        return view('admin.transaction.create');
    }

    public function index()
    {
        if (!Auth()->user()->can('transaction')) {
            return abort(401);
         }
        return view('admin.transaction.index');
    }

    // Other Bank Transaction Request List
    public function bank_transaction_request()
    {
        if (!Auth()->user()->can('transaction')) {
            return abort(401);
         }
        $transaction_request = Banktransection::where('status', 2)->paginate(20);
        return view('admin.transaction.bank_transaction_request', compact('transaction_request'));
    }

    public function bank_transaction_request_search(Request $request){
        if ($request->type == 'duration') {
            $start_date   = $request->start_date . " 00:00:00";
            $end_date     = $request->end_date . " 23:59:59";
            if ($request->start_date == '' &&  $request->end_date == '') {
                $transaction_request = Banktransection::where('status', 2)->paginate(10);
            }elseif ($request->start_date == '' && $request->end_date != '') {
                $transaction_request = Banktransection::where('created_at','<', $request->end_date)->where('status', 2)->paginate(10);
            }elseif ($request->start_date != '' && $request->end_date == '') {
                $transaction_request = Banktransection::where('created_at','>', $request->start_date)->where('status', 2)->paginate(10);
            }else{
                $transaction_request = Banktransection::whereBetween('created_at', [$start_date, $end_date])->where('status',  2)->paginate(10);
            }
            return view('admin.transaction.bank_transaction_request', compact('transaction_request'));
        }elseif ($request->type == 'account_number') {
            $data = $request->q;
            $transaction_request = Banktransection::where('status', 2)->whereHas('user', function ($query) use ($data) {
                return $query->where('account_number', 'LIKE', "%$data%");
             })->paginate(10);
             return view('admin.transaction.bank_transaction_request', compact('transaction_request'));
        }elseif ($request->type == 'trx') {
            $data = $request->q;
            $transaction_request = Banktransection::where('status', 2)->whereHas('transaction', function ($query) use ($data) {
                return $query->where('trxid', 'LIKE', "%$data%");
             })->paginate(10);
             return view('admin.transaction.bank_transaction_request', compact('transaction_request'));
        }
    }

    public function bank_transaction_approved_search(Request $request){ 
        if ($request->type == 'duration') {
            $start_date   = $request->start_date . " 00:00:00";
            $end_date     = $request->end_date . " 23:59:59";
            if ($request->start_date == '' &&  $request->end_date == '') {
                $transaction_approved = Banktransection::where('status', 1)->paginate(10);
            }elseif ($request->start_date == '' && $request->end_date != '') {
                $transaction_approved = Banktransection::where('created_at','<', $request->end_date)->where('status', 1)->paginate(10);
            }elseif ($request->start_date != '' && $request->end_date == '') {
                $transaction_approved = Banktransection::where('created_at','>', $request->start_date)->where('status', 1)->paginate(10);
            }else{
                $transaction_approved = Banktransection::whereBetween('created_at', [$start_date, $end_date])->where('status',  1)->paginate(10);
            }
            return view('admin.transaction.bank_transaction_approved', compact('transaction_approved'));
        }elseif ($request->type == 'account_number') {
            $data = $request->q;
            $transaction_approved = Banktransection::where('status', 1)->whereHas('user', function ($query) use ($data) {
                return $query->where('account_number', 'LIKE', "%$data%");
             })->paginate(10);
             return view('admin.transaction.bank_transaction_approved', compact('transaction_approved'));
        }elseif ($request->type == 'trx') {
            $data = $request->q;
            $transaction_approved = Banktransection::where('status', 1)->whereHas('transaction', function ($query) use ($data) {
                return $query->where('trxid', 'LIKE', "%$data%");
             })->paginate(10);
             return view('admin.transaction.bank_transaction_approved', compact('transaction_approved'));
        }
    }
    public function bank_transaction_rejected_search(Request $request){ 
        if ($request->type == 'duration') {
            $start_date   = $request->start_date . " 00:00:00";
            $end_date     = $request->end_date . " 23:59:59";
            if ($request->start_date == '' &&  $request->end_date == '') {
                $transaction_rejected = Banktransection::where('status', 0)->paginate(10);
            }elseif ($request->start_date == '' && $request->end_date != '') {
                $transaction_rejected = Banktransection::where('created_at','<', $request->end_date)->where('status', 0)->paginate(10);
            }elseif ($request->start_date != '' && $request->end_date == '') {
                $transaction_rejected = Banktransection::where('created_at','>', $request->start_date)->where('status', 0)->paginate(10);
            }else{
                $transaction_rejected = Banktransection::whereBetween('created_at', [$start_date, $end_date])->where('status',  0)->paginate(10);
            }
            return view('admin.transaction.bank_transaction_approved', compact('transaction_rejected'));
        }elseif ($request->type == 'account_number') {
            $data = $request->q;
            $transaction_rejected = Banktransection::where('status', 0)->whereHas('user', function ($query) use ($data) {
                return $query->where('account_number', 'LIKE', "%$data%");
             })->paginate(10);
             return view('admin.transaction.bank_transaction_approved', compact('transaction_rejected'));
        }elseif ($request->type == 'trx') {
            $data = $request->q;
            $transaction_rejected = Banktransection::where('status', 0)->whereHas('transaction', function ($query) use ($data) {
                return $query->where('trxid', 'LIKE', "%$data%");
             })->paginate(10);
             return view('admin.transaction.bank_transaction_approved', compact('transaction_rejected'));
        }
    }
    // Other Bank Transaction Approved Lists
    public function bank_transaction_approved(){
        if (!Auth()->user()->can('transaction')) {
            return abort(401);
         }
        $transaction_approved = Banktransection::where('status', 1)->paginate(20);
        return view('admin.transaction.bank_transaction_approved', compact('transaction_approved'));
    }

    // Other Bank Transaction Approved
    public function bankTransactionApproved($id){
        if (!Auth()->user()->can('transaction')) {
            return abort(401);
         }
        $transaction_approved         = Banktransection::findOrFail($id);
        $transaction_approved->status = 1;
        $transaction_approved->save();


        $transaction         = Transaction::where('id', $transaction_approved->transaction_id)->first();
        $transaction->status = 1;
        $transaction->save();

        return redirect()->back()->with('success', 'Transaction Approved Successfully');
    }

    // Bank Transaction Rejected Lists
    public function bank_transaction_rejected(){
        if (!Auth()->user()->can('transaction')) {
            return abort(401);
         }
        $transaction_rejected = Banktransection::where('status', 0)->paginate(20);
        return view('admin.transaction.bank_transaction_rejected', compact('transaction_rejected'));
    }

    // Bank Transaction Reject
    public function bankTransactionRejected($id){

        $transaction_rejected         = Banktransection::findOrFail($id);
        $transaction                  = Transaction::where('id', $transaction_rejected->transaction_id)->first();
        $transaction->status          = 0; 
        $transaction->save();
         
        $amount                       = $transaction_rejected->transaction->amount;
        $transaction_rejected->status = 0;
        $transaction_rejected->save();
        
        $user          = User::where('id', $transaction_rejected->user_id)->first();
        $user->balance = $user->balance + $amount;
        $user->save();

        return redirect()->back()->with('success', 'Transaction Rejected Successfully');
    }

    // Bank Transaction View
    public function bank_transaction_view($id)
    {
        if (!Auth()->user()->can('transaction')) {
            return abort(401);
         }
        $transaction = Banktransection::findOrFail($id);

        return view('admin.transaction.bank_transaction_view', compact('transaction'));
    }

    // All Transaction
    public function allTransaction()
    {
        if (!Auth()->user()->can('transaction')) {
            return abort(401);
         }
        $transactions = Transaction::latest()->paginate(50);
        return view('admin.transaction.all_transaction', compact('transactions'));
    }

    // All Transaction Search report
    public function allTransactionSearchReport(Request $request)
    {
        $start_date   = $request->start_date . " 00:00:00";
        $end_date     = $request->end_date . " 23:59:59";
        $transactions = Transaction::whereBetween('created_at', [$start_date, $end_date])->paginate(20);
        return view('admin.transaction.all_transaction', compact('transactions', 'start_date', 'end_date'));
    }

    // All Transaction Trx report
    public function allTransactionTrxReport(Request $request)
    {
        $trx_id = $request->value;
        if ($request->type == 'trxid') {
            $transactions = Transaction::where('trxid', 'LIKE', "%$request->value%")->paginate(20);
            return view('admin.transaction.all_transaction', compact('transactions', 'trx_id'));
        }
    }

    // All Transaction View
    public function allTransactionView($id)
    {
        if (!Auth()->user()->can('transaction')) {
            return abort(401);
         }
        $transaction = Transaction::findOrFail($id);
        return view('admin.transaction.all_transaction_show', compact('transaction'));
    }

    public function allBills()
    {
        if (!Auth()->user()->can('transaction')) {
            return abort(401);
         }
        $transactions = Transaction::where('type', 'bill_credit')->orWhere('type','bill_debit')->paginate(10);
        return view('admin.transaction.bill', compact('transactions'));
    }

    public function allBillSearch(Request $request)
    {
        if ($request->type == 'duration') {
            $start_date   = $request->start_date . " 00:00:00";
            $end_date     = $request->end_date . " 23:59:59";
            if ($request->start_date == '' &&  $request->end_date == '') {
                $transactions = Transaction::where('type', 'bill_credit')->orWhere('type','bill_debit')->paginate(10);
            }elseif ($request->start_date == '' && $request->end_date != '') {
                $transaction = Transaction::where('created_at','<', $request->end_date)->where('type', 'bill_credit')->orWhere('type','bill_debit')->paginate(10);
            }elseif ($request->start_date != '' && $request->end_date == '') {
                $transactions = Transaction::where('created_at','>', $request->start_date)->where('type', 'bill_credit')->orWhere('type','bill_debit')->paginate(10);
            }else{
                $transactions = Transaction::whereBetween('created_at', [$start_date, $end_date])->where('status',  0)->paginate(10);
            }
            return view('admin.transaction.bill', compact('transactions'));
        }elseif ($request->type == 'account_number') {
            $data = $request->q;
            $transactions = Transaction::where('type', 'bill_credit')->orWhere('type','bill_debit')->whereHas('user', function ($query) use ($data) {
                return $query->where('account_number', 'LIKE', "%$data%");
             })->paginate(10);
             return view('admin.transaction.bill', compact('transactions'));
        }elseif ($request->type == 'trx') {
            $data = $request->q;
            $transactions = Transaction::where('type', 'bill_credit')->orWhere('type','bill_debit')->where('trxid', 'LIKE',  "%$data%")->paginate(10);
             return view('admin.transaction.bill', compact('transactions'));
        }
        return view('admin.transaction.bill', compact('transactions'));
    }


    //Own Bank Transaction List
    public function ownbankTransactions()
    {
        if (!Auth()->user()->can('transaction')) {
            return abort(401);
         }
        $transaction = Transaction::where('type', 'ownbank_transfer_credit')->orWhere('type','ownbank_transfer_debit')->paginate(10);
        return view('admin.transaction.ownbank', compact('transaction'));
    }
    
    public function ownbankView($id)
    {
        if (!Auth()->user()->can('transaction')) {
            return abort(401);
         }
        $transaction = Transaction::findOrFail($id);
        return view('admin.transaction.ownbankview', compact('transaction'));
    }

    public function ownbankSearch(Request $request){
        if ($request->type == 'duration') {
            $start_date   = $request->start_date . " 00:00:00";
            $end_date     = $request->end_date . " 23:59:59";
            if ($request->start_date == '' &&  $request->end_date == '') {
                $transaction = Transaction::where('type', 'ownbank_transfer_credit')->orWhere('type','ownbank_transfer_debit')->paginate(10);
            }elseif ($request->start_date == '' && $request->end_date != '') {
                $transaction = Transaction::where('created_at','<', $request->end_date)->where('type', 'ownbank_transfer_credit')->orWhere('type','ownbank_transfer_debit')->paginate(10);
            }elseif ($request->start_date != '' && $request->end_date == '') {
                $transaction = Transaction::where('created_at','>', $request->start_date)->where('type', 'ownbank_transfer_credit')->orWhere('type','ownbank_transfer_debit')->paginate(10);
            }else{
                $transaction = Transaction::whereBetween('created_at', [$start_date, $end_date])->where('status',  0)->paginate(10);
            }
            return view('admin.transaction.ownbank', compact('transaction'));
        }elseif ($request->type == 'account_number') {
            $data = $request->q;
            $transaction = Transaction::where('type', 'ownbank_transfer_credit')->orWhere('type','ownbank_transfer_debit')->whereHas('user', function ($query) use ($data) {
                return $query->where('account_number', 'LIKE', "%$data%");
             })->paginate(10);
             return view('admin.transaction.ownbank', compact('transaction'));
        }elseif ($request->type == 'trx') {
            $data = $request->q;
            $transaction = Transaction::where('type', 'ownbank_transfer_credit')->orWhere('type','ownbank_transfer_debit')->where('trxid', 'LIKE',  "%$data%")->paginate(10);
             return view('admin.transaction.ownbank', compact('transaction'));
        }
    }
}
