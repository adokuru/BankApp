<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use App\Models\Loanplan;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\str;
use Illuminate\Support\Carbon;

class LoanmanagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth()->user()->can('loan.management.index')) {
            return abort(401);
        }
        $loans = Loanplan::latest()->paginate(20);
        return view('admin.loanmanagement.index', compact('loans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth()->user()->can('loan.management.create')) {
            return abort(401);
        }
        return view('admin.loanmanagement.create');
    }

    public function loanPackage()
    {
         if (!Auth()->user()->can('loan.management.index')) {
            return abort(401);
        }
        return view('admin.loanmanagement.package');
    }

    public function loanRequest()
    {
        if (!Auth()->user()->can('loan.request.list')) {
            return abort(401);
        }
        $loan_request = Loan::where('status', 2)->paginate(20);
        return view('admin.loanmanagement.request', compact('loan_request'));
    }

    public function loanSearch(Request $request)
    {
        // whereBetween('created_at', [$start_date, $end_date])->paginate(20);
        if ($request->type == 'duration') {
            $start_date   = $request->start_date . " 00:00:00";
            $end_date     = $request->end_date . " 23:59:59";
            if ($request->start_date == '' &&  $request->end_date == '') {
                $loan_request = Loan::where('status', 2)->paginate(10);
            }elseif ($request->start_date == '' && $request->end_date != '') {
                $loan_request = Loan::where('return_date','<', $request->end_date)->paginate(10);
            }elseif ($request->start_date != '' && $request->end_date == '') {
                $loan_request = Loan::where('return_date','>', $request->start_date)->paginate(10);
            }else{
                $loan_request = Loan::whereBetween('return_date', [$start_date, $end_date])->paginate(10);
            }
            return view('admin.loanmanagement.request', compact('loan_request'));
        }elseif ($request->type == 'account_number') {
            $data = $request->q;
            $loan_request = Loan::with('user')->whereHas('user', function ($query) use ($data) {
                return $query->where('account_number', 'LIKE', "%$data%");
             })->paginate(10);
            return view('admin.loanmanagement.request', compact('loan_request'));
        }
    }

    // Loan Request Approved
    public function loanRequestApproved($id)
    {
        $loan_approved = Loan::findOrFail($id);
        $loan_approved->status = 1;
        $loan_approved->return_date = \Carbon\Carbon::now()->addDays(($loan_approved->days - 1))->format('Y-m-d');
        $loan_approved->save();

        // User
        $user          = User::where('id', $loan_approved->user_id)->first();
        $user->balance = $user->balance + $loan_approved->amount;
        $user->save();

        // Transaction
        $transactions          = new Transaction();
        $transactions->user_id = $user->id;
        $transactions->trxid   = Str::random(10);
        $transactions->amount  = $loan_approved->amount;
        $transactions->balance = $user->balance;
        $transactions->fee     = 0;
        $transactions->status  = '1';
        $transactions->info  = 'Loan Approved From Request';
        $transactions->type    = 'loan';
        $transactions->save();
        return redirect()->back()->with('success', 'Approved Successfully');
    }

   

    // Loan Request Rejected
    public function loanRequestRejected($id)
    {
        $loan_rejected = Loan::findOrFail($id);
        $loan_rejected->status = 0;
        $loan_rejected->save();
        return redirect()->back()->with('success', 'Rejected Successfully');
    }

    // Loan Approved List
    public function loanApprovedIndex(){
        if (!Auth()->user()->can('loan.approved.index')) {
            return abort(401);
        }
        $loan_approved = Loan::where('status', 1)->paginate(20);
        return view('admin.loanmanagement.approved', compact('loan_approved'));
    }

    public function loanRequestShow($id){
        if (!Auth()->user()->can('loan.request.view')) {
            return abort(401);
        }
        $loan = Loan::with(['user','loanplan'])->findOrFail($id);
        return view('admin.loanmanagement.show', compact('loan'));
    }
    public function loanApprovedSearch(Request $request)
    {
        if ($request->type == 'duration') {
            $start_date   = $request->start_date . " 00:00:00";
            $end_date     = $request->end_date . " 23:59:59";
            if ($request->start_date == '' &&  $request->end_date == '') {
                $loan_approved = Loan::where('status', 1)->paginate(10);
            }elseif ($request->start_date == '' && $request->end_date != '') {
                $loan_approved = Loan::where('status', 1)->where('return_date','<', $request->end_date)->paginate(10);
            }elseif ($request->start_date != '' && $request->end_date == '') {
                $loan_approved = Loan::where('status', 1)->where('return_date','>', $request->start_date)->paginate(10);
            }else{
                $loan_approved = Loan::where('status', 1)->whereBetween('return_date', [$start_date, $end_date])->paginate(10);
            }
            return view('admin.loanmanagement.approved', compact('loan_approved'));
        }elseif ($request->type == 'account_number') {
            $data = $request->q;
            $loan_approved = Loan::where('status', 1)->with('user')->whereHas('user', function ($query) use ($data) {
                return $query->where('account_number', 'LIKE', "%$data%");
             })->paginate(10);
            return view('admin.loanmanagement.approved', compact('loan_approved'));
        }
    }

    public function loanRejectedIndex()
    {
        if (!Auth()->user()->can('loan.rejected.index')) {
            return abort(401);
        }
        $loan_rejected = Loan::where('status', 0)->latest()->paginate(20);
        return view('admin.loanmanagement.rejected', compact('loan_rejected'));
    }

    public function loanRejectedSearch(Request $request)
    {
        if ($request->type == 'duration') {
            $start_date   = $request->start_date . " 00:00:00";
            $end_date     = $request->end_date . " 23:59:59";
            if ($request->start_date == '' &&  $request->end_date == '') {
                $loan_rejected = Loan::where('status', 0)->paginate(10);
            }elseif ($request->start_date == '' && $request->end_date != '') {
                $loan_rejected = Loan::where('status', 0)->where('return_date','<', $request->end_date)->paginate(10);
            }elseif ($request->start_date != '' && $request->end_date == '') {
                $loan_rejected = Loan::where('status', 0)->where('return_date','>', $request->start_date)->paginate(10);
            }else{
                $loan_rejected = Loan::where('status', 0)->whereBetween('return_date', [$start_date, $end_date])->paginate(10);
            }
            return view('admin.loanmanagement.rejected', compact('loan_rejected'));
        }elseif ($request->type == 'account_number') {
            $data = $request->q;
            $loan_rejected = Loan::where('status', 0)->with('user')->whereHas('user', function ($query) use ($data) {
                return $query->where('account_number', 'LIKE', "%$data%");
             })->paginate(10);
            return view('admin.loanmanagement.rejected', compact('loan_rejected'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate
        $request->validate([
            'name'        => 'required',
            'min_amount'  => 'required|min:1|lt:max_amount',
            'max_amount'  => 'required|gt:min_amount',
            'charge_type' => 'required',
            'duration'    => 'required',
        ]);

        // Load Store
        $loan_store                  = new Loanplan();
        $loan_store->name            = $request->name;
        $loan_store->min_amount      = $request->min_amount;
        $loan_store->max_amount      = $request->max_amount;
        $loan_store->charge_type     = $request->charge_type;
        $loan_store->fixed_charged   = ($request->charge_type == 'fixed' || $request->charge_type == 'both') ? ($request->fix_charge ?? 0) : 0;
        $loan_store->percent_charged = ($request->charge_type == 'percentage' || $request->charge_type == 'both') ? ($request->percent_charge ?? 0) : 0;
        $loan_store->duration        = $request->duration;
        $loan_store->status          = $request->status;
        $loan_store->save();

        return response()->json('Loan Package Added');
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
        if (!Auth()->user()->can('loan.management.edit')) {
            return abort(401);
        }
        // Loan Edit
        $loan_edit = Loanplan::findOrFail($id);
        return view('admin.loanmanagement.edit', compact('loan_edit'));
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
        // Validate
        $request->validate([
            'name'        => 'required',
            'min_amount'  => 'required',
            'max_amount'  => 'required',
            'charge_type' => 'required',
            'duration'    => 'required',
        ]);
        // Load Update
        $loan_update                  = Loanplan::findOrFail($id);
        $loan_update->name            = $request->name;
        $loan_update->min_amount      = $request->min_amount;
        $loan_update->max_amount      = $request->max_amount;
        $loan_update->charge_type     = $request->charge_type;
        $loan_update->fixed_charged   = ($request->charge_type == 'fixed' || $request->charge_type == 'both') ? ($request->fix_charge ?? 0) : 0;
        $loan_update->percent_charged = ($request->charge_type == 'percentage' || $request->charge_type == 'both') ? ($request->percent_charge ?? 0) : 0;
        $loan_update->duration        = $request->duration;
        $loan_update->status          = $request->status;
        $loan_update->save();

        return response()->json('Loan updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth()->user()->can('loan.management.delete')) {
            return abort(401);
        }
        // Loan Deleted
        $loan_delete = Loanplan::findOrFail($id);
        $loan_delete->delete();
        return redirect()->back()->with('success', 'Successfully Deleted');
    }


    public function loanReturn(Request $request)
    {
        if (!Auth()->user()->can('loan.management.returnlist')) {
            return abort(401);
        }
        if ($request->type == 'duration') {
            $start_date   = $request->start_date . " 00:00:00";
            $end_date     = $request->end_date . " 23:59:59";
            if ($request->start_date == '' &&  $request->end_date == '') {
                $posts = Loan::where('status', 3)->latest()->with('user','loanplan')->paginate(10);
            }elseif ($request->start_date == '' && $request->end_date != '') {
                $posts = Loan::where('status', 3)->latest()->with('user','loanplan')->where('return_date','<', $request->end_date)->paginate(10);
            }elseif ($request->start_date != '' && $request->end_date == '') {
                $posts = Loan::where('status', 3)->latest()->with('user','loanplan')->where('return_date','>', $request->start_date)->paginate(10);
            }else{
                $posts = Loan::where('status', 3)->latest()->with('user','loanplan')->whereBetween('return_date', [$start_date, $end_date])->paginate(10);
            }
            return view('admin.loanmanagement.returnlist', compact('posts','request'));
        }elseif ($request->type == 'account_number') {
            $data = $request->q;
            $posts = Loan::where('status', 3)->latest()->with('user','loanplan')->whereHas('user', function ($query) use ($data) {
                return $query->where('account_number',$data);
             })->paginate(50);
             return view('admin.loanmanagement.returnlist', compact('posts','request'));
        }

        $posts=Loan::where('status',3)->with('user','loanplan')->paginate(50);
        return view('admin.loanmanagement.returnlist', compact('posts','request'));
    }
}
