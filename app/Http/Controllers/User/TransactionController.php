<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Banktransection;
use App\Models\Transaction;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function history(){
        $transactions = Transaction::where('user_id', Auth::id())->latest()->paginate(15);
        return view('user.transaction.history', compact('transactions'));
    }
    // Transaction Search
    public function transcctionSearch(Request $request)
    {
        $start_date       = $request->start_date . " 00:00:00";
        $end_date         = $request->end_date . " 23:59:59";
        $search_statement = Transaction::where('user_id', Auth::id())->whereBetween('created_at', [$start_date, $end_date])->get();
        return view('user.transaction.transaction_search', compact('search_statement', 'start_date', 'end_date'));
    }

    public function view($id){
        $transaction = Transaction::where('user_id', Auth::id())->findOrFail($id);
        return view('user.transaction.view', compact('transaction'));
    }

    public function transactionPDF(){
        $transactions = Transaction::where('user_id', Auth::id())->latest()->get();
        $now = Carbon::now();
        $now = $now->toDateTimeString();
        $file_name = 'otherbank_report_' . $now. '.pdf';
        $pdf = PDF::loadView('user.transaction.pdf', compact('transactions'));
        return $pdf->download($file_name);
    }
}
