<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Banktransection;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class StatementController extends Controller
{
    // Account Statment List
    public function accountStatement()
    {
        return view('user.statment.statment_index');
    }

    // Own Bank Statment
    public function OwnBankStatement()
    {
        $transactions = Transaction::where('user_id', Auth::id())
        ->where(function($query){
            $query->where('type', 'ownbank_transfer_credit')
            ->orWhere('type','ownbank_transfer_debit');
        })->latest()->paginate(15);

        return view('user.statment.own_bank_statment',compact('transactions'));
    }

    // own bank statment view
    public function ownBankStatementView($id)
    {
        $transaction = Transaction::where('user_id', Auth::id())->where('id', $id)->where('type', 'ownbank_transfer_credit')->orWhere('type','ownbank_transfer_debit')->first();
        if ($transaction->user_id !=  Auth::id()) {
            return abort(404);
        }
        return view('user.statment.own_bank_statement_view', compact('transaction'));
    }

    // E-Depost Statement
    public function eDepositStatement()
    {
        $transactions = Transaction::where('user_id', Auth::id())->where('type', 'edeposit')->latest()->paginate(15);
        return view('user.statment.edeposit_statment', compact('transactions'));
    }

    // Others Bank Statement
    public function OtherBankStatement()
    {
        $transactions = Banktransection::with('transaction')->where('user_id', Auth::user()->id)->latest()->paginate(20);

        return view('user.statment.others_bank_statment', compact('transactions'));
    }

    // Others Bank View
    public function OtherBankStatementView($id)
    {
        $transaction = Banktransection::where('user_id', Auth::id())->with('transaction')->findorFail($id);
        
        return view('user.statment.other_bank_statement_view', compact('transaction'));
    }

    //bill statement 
    public function billStatement()
    {
        $payments = Payment::with(['sender','receiver'])
        ->where(function($query){
            $query->where('sender_id', Auth::id())
            ->orWhere('receiver_id',Auth::id());
        })->latest()->paginate(10);
        
        return view('user.statment.bill_statement', compact('payments'))->with('i', 1);
    }

    //bill statement View
    public function billStatementView($id)
    {
        $payment = Payment::with(['sender','receiver'])->findOrFail($id);
        $auth = Auth::id();

        if ($payment->sender_id !=  $auth && $payment->receiver_id !=  $auth) {
            abort(404);
        }
        
        return view('user.statment.bill_statement_view', compact('payment'));   
        
        
    }


    public function ownBankStatementPDF(){
    $transactions = Transaction::where('user_id', Auth::id())
        ->where(function($query){
            $query->where('type', 'ownbank_transfer_credit')
            ->orWhere('type','ownbank_transfer_debit');
        })->latest()->get();
     $now = Carbon::now();
     $now = $now->toDateTimeString();
     $file_name = 'ownbank_report_' . $now. '.pdf';
     $pdf = PDF::loadView('user.statment.ownbankpdf', compact('transactions'));
     return $pdf->download($file_name);
   }

   public function otherBankStatementPDF(){
     $transactions = Banktransection::with('transaction')->where('user_id', Auth::user()->id)->latest()->get();
     $now = Carbon::now();
     $now = $now->toDateTimeString();
     $file_name = 'otherbank_report_' . $now. '.pdf';
     $pdf = PDF::loadView('user.statment.otherbankpdf', compact('transactions'));
     return $pdf->download($file_name);
   }

   public function billStatementPDF(){
    $payments = Payment::with(['sender','receiver'])
    ->where(function($query){
        $query->where('sender_id', Auth::id())
        ->orWhere('receiver_id',Auth::id());
    })->latest()->get();

     $now = Carbon::now();
     $now = $now->toDateTimeString();
     $file_name = 'bill_report_' . $now. '.pdf';
     $pdf = PDF::loadView('user.statment.billpdf', compact('payments'));
     return $pdf->download($file_name);
   }
   
   public function eDepositStatementPDF(){
        $transactions = Transaction::where('user_id', Auth::id())->where('type', 'edeposit')->latest()->get();
        $now = Carbon::now();
        $now = $now->toDateTimeString();
        $file_name = 'bill_report_' . $now. '.pdf';
        $pdf = PDF::loadView('user.statment.edepositpdf', compact('transactions'));
        return $pdf->download($file_name);
   }

}
