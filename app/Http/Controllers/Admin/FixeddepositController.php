<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fdrplan;
use App\Models\Fdrtransaction;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\str;
use Auth;
class FixeddepositController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth()->user()->can('fixeddeposit.index')) {
            return abort(401);
        }
        $fdr_plans = Fdrplan::latest()->paginate(10);
        return view('admin.fixeddeposit.index', compact('fdr_plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth()->user()->can('fixeddeposit.create')) {
           return abort(401);
        }
        return view('admin.fixeddeposit.create');
    }

    public function fixedDepositPackage()
    {
        return view('admin.fixeddeposit.package');
    }

    // Fixed Deposite Request
    public function fixedDepositRequest()
    {
         if (!Auth()->user()->can('fixeddeposit.request')) {
           return abort(401);
        }
        $deposit_request = Fdrtransaction::where('status', 2)->paginate(20);
        return view('admin.fixeddeposit.request', compact('deposit_request'));
    }

    public function fdr_request_activate(){

        $data = Fdrtransaction::where('status', 2)->where('return_date', '<=', Carbon::today());
        foreach ($data->get() as $key => $value) {
            $balance_update = User::findOrFail($value->user_id);
            $balance_update->balance = $balance_update->balance + $value->return_total;
            $balance_update->save();
        }
        $data->update(['status' => 1]);
        return response()->json('Success!');
    }

    public function fixedDepositComplete()
    {
        if (!Auth()->user()->can('fixeddeposit.complete.index')) {
            return abort(401);
         }
        $deposit_complete = Fdrtransaction::where('status', 1)->paginate(20);
        return view('admin.fixeddeposit.complete', compact('deposit_complete'));
    }

    public function fixedDepositFailed()
    {
        if (!Auth()->user()->can('fixeddeposit.failed.index')) {
            return abort(401);
         }
        $deposit_failed = Fdrtransaction::where('status', 0)->paginate(20);
        return view('admin.fixeddeposit.failed', compact('deposit_failed'));
    }

    public function fixedDepositHistory()
    {
        if (!Auth()->user()->can('fixeddeposit.history.index')) {
            return abort(401);
         }
        $deposit_history = Fdrtransaction::latest()->paginate(20);
        return view('admin.fixeddeposit.history', compact('deposit_history'));
    }

    // Fixed Depostie Approved
    public function fixedDepositApproved($id)
    {
        $fdr_approved         = Fdrtransaction::findOrFail($id);
        $fdr_approved->status = 1;
        $fdr_approved->save();
        return redirect()->back()->with('success', 'Request Completed');

    }

    // Fixed Deposit Reject
    public function fixedDepositRejected($id)
    {
        $fdr_rejected         = Fdrtransaction::findOrFail($id);
        $fdr_rejected->status = 0;
        $fdr_rejected->save();

        // User balance Return
        $balance_return          = User::where('id', $fdr_rejected->user_id)->first();
        $balance_return->amount  = $fdr_rejected->amount;
        $balance_return->balance = $balance_return->balance + $fdr_rejected->amount;
        $balance_return->save();

        // Transaction
        $transactions          = new Transaction();
        $transactions->user_id = $balance_return->id;
        $transactions->trxid   = Str::random(10);
        $transactions->amount  = $fdr_rejected->amount;
        $transactions->balance = $balance_return->balance;
        $transactions->fee     = 0;
        $transactions->status  = '1';
        $transactions->info    = 'Fixed Deposit Rejected';
        $transactions->type    = 'fixed_deposit_rejected';
        $transactions->save();
        return redirect()->back()->with('success', 'Deposit Rejected Successfull');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'title'          => 'required',
            'min_amount'     => 'required|min:1|lt:max_amount',
            'max_amount'     => 'required|gt:min_amount',
            'percent_return' => 'required',
            'duration'       => 'required',
        ]);

        $fdr_plan                 = new Fdrplan();
        $fdr_plan->title          = $request->title;
        $fdr_plan->min_amount     = $request->min_amount;
        $fdr_plan->max_amount     = $request->max_amount;
        $fdr_plan->percent_return = $request->percent_return;
        $fdr_plan->duration       = $request->duration;
        $fdr_plan->save();

        return response()->json('Fixed Deposit Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth()->user()->can('fixeddeposit.edit')) {
            return abort(401);
         }
        $fdr_plan = Fdrplan::findOrFail($id);
        return view('admin.fixeddeposit.edit', compact('fdr_plan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'          => 'required',
            'min_amount'     => 'required',
            'max_amount'     => 'required',
            'percent_return' => 'required',
            'duration'       => 'required',
        ]);

        $fdr_plan                 = Fdrplan::findOrFail($id);
        $fdr_plan->title          = $request->title;
        $fdr_plan->min_amount     = $request->min_amount;
        $fdr_plan->max_amount     = $request->max_amount;
        $fdr_plan->percent_return = $request->percent_return;
        $fdr_plan->duration       = $request->duration;
        $fdr_plan->status         = $request->status;
        $fdr_plan->save();

        return response()->json('Fixed Deposit Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth()->user()->can('fixeddeposit.delete')) {
            return abort(401);
         }
        $fdr_plan = Fdrplan::findOrFail($id);
        $fdr_plan->delete();
        return redirect()->back()->with('success', 'Successfully Deleted!');
    }
}
