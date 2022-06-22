<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Account;
use App\Models\Debits;
use App\Models\Deposit;
use App\Models\MoneyTransfer;
use App\Models\User;
use App\Models\Gallery;
class LoansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function step1(Request $request)
    {
        $user = Auth::user();
        $account = Account::where('user_id', $user->id)->first();
        if(!$request->select_loan_type)
        {
            return redirect()->back()->with('error', 'Select a loan type');
        }
        $loan = Loan::create([
            'account_id' => $account->id,
            'loan_type' => $request->select_loan_type,
            'financing' => $request->financing,
            'duration'=> $request->duration,
            'loan-amount' => $request->loan_amount
        ]);
        return view('users.loan_step', compact('user', 'account', 'loan'));
    }
    public function step2(Request $request)
    {
        $user = Auth::user();
        $account = Account::where('user_id', $user->id)->first();
        $loan = Loan::where('id', $request->id)->first();
        return view('users.loan_image', compact('user', 'account','loan'));
    }
        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function step3(Request $request)
    {
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);
        
        $imageUpload = new Gallery();
        $imageUpload->filename = $imageName;
        $imageUpload->save();
        return redirect()->route('Account_loans');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function show(Loan $loan)
    {
        $user = Auth::user();
        $account = Account::where('user_id', $user->id)->first();
        return view('users.loan_single', compact('user', 'account','loan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function edit(Loan $loan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Loan $loan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Loan $loan)
    {
        //
    }
}
