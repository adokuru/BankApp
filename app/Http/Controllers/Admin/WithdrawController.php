<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Term;
use App\Models\Termwithdraw;
use App\Models\User;
use App\Models\Withdraw;
use App\Models\Withdrawmethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WithdrawController extends Controller
{
    public function show(){

    }
    // Withdraw Create
    public function create()
    {
        if (!Auth()->user()->can('withdraw.create')) {
           return abort(401);
        }
        $currencies = Term::with('currencyMeta')->where('type', 'currency')->get();
        return view('admin.withdraw.create', compact('currencies'));
    }

    // Withdraw Index
    public function index()
    {
        if (!Auth()->user()->can('withdraw.index')) {
            return abort(401);
         }
        $withdraw_lists = Withdrawmethod::latest()->paginate(20);
        return view('admin.withdraw.index', compact('withdraw_lists'));
    }

    // Withdraw Store
    public function store(Request $request)
    {
        // if (!Auth()->user()->can('withdraw.store')) {
        //     return abort(401);
        //  }

        // Withdraw Validate
        $request->validate([
            'name'            => 'required',
            'min_amount'      => 'required|min:1|lt:max_amount',
            'max_amount'      => 'required|gt:min_amount',
            'charge_type'     => 'required',
            'charge_type'     => 'required',
        ]);

        // Withdraw Store
        $withdraw_store                  = new Withdrawmethod();
        $withdraw_store->title           = $request->name;
        $withdraw_store->min_amount      = $request->min_amount;
        $withdraw_store->max_amount      = $request->max_amount;
        $withdraw_store->charge_type     = $request->charge_type;
        $withdraw_store->fix_charge      = ($request->charge_type == 'fixed' || $request->charge_type == 'both') ? ($request->fixed_charge ?? 0) : 0;
        $withdraw_store->percent_charge  = ($request->charge_type == 'percentage' || $request->charge_type == 'both') ? ($request->percent_charge ?? 0) : 0;
        $withdraw_store->status          = $request->status;
        
        $withdraw_store->save();

        $term_withdraw = new Termwithdraw();
        $data = [];
        foreach ($request->currency as $key => $value) {  //Currency as term id
            $data[] = [
                'term_id' => $value,
                'withdrawmethod_id' => $withdraw_store->id
            ];
        }

        $term_withdraw->insert($data);
        
        return response()->json('Withdraw Added Successfully');
    }

    // Withdraw Store
    public function edit($id)
    {
        if (!Auth()->user()->can('withdraw.edit')) {
            return abort(401);
         }
        $currencies = Term::with('currencyMeta')->where('type', 'currency')->get();
        $withdraw_edit = Withdrawmethod::with('term')->findOrFail($id);
        return view('admin.withdraw.edit', compact('withdraw_edit', 'currencies'));
    }

    // Withdraw Update
    public function update(Request $request, $id)
    {
        // if (!Auth()->user()->can('withdraw.update')) {
        //     return abort(401);
        //  }
        // Withdraw Validate
        $request->validate([
            'name'            => 'required',
            'min_amount'     => 'required|min:1|lt:max_amount',
            'max_amount'     => 'required|gt:min_amount',
            'charge_type'     => 'required',
        ]);

        // Withdraw Store
        $withdraw_update                  = Withdrawmethod::findOrFail($id);
        $withdraw_update->title           = $request->name;
        $withdraw_update->min_amount      = $request->min_amount;
        $withdraw_update->max_amount      = $request->max_amount;
        $withdraw_update->charge_type     = $request->charge_type;
        $withdraw_update->fix_charge      = ($request->charge_type == 'fixed' || $request->charge_type == 'both') ? ($request->fixed_charge ?? 0) : 0;
        $withdraw_update->percent_charge  = ($request->charge_type == 'percentage' || $request->charge_type == 'both') ? ($request->percent_charge ?? 0) : 0;
        $withdraw_update->status          = $request->status;
        $withdraw_update->save();

        Termwithdraw::where('withdrawmethod_id', $withdraw_update->id)->delete();

        $data = [];
        foreach ($request->currency as $key => $value) {  //Currency as term id
            $data[] = [
                'term_id' => $value,
                'withdrawmethod_id' => $withdraw_update->id
            ];
        }
        $term_withdraw = new Termwithdraw();
        $term_withdraw->insert($data);

        return response()->json('Withdraw Updated Successfully');
    }

    public function bankwithdrawView($id){
        $withdraw = Withdraw::with(['withdrawmethod','term','user'])->findOrFail($id);
        return view('admin.withdraw.view', compact('withdraw'));
    }

    public function withdraw_request(Request $request){
        if (!Auth()->user()->can('withdraw.request.index')) {
            return abort(401);
         }
         if($request->q != null){
            $withdraws = Withdraw::with('user')->with('withdrawmethod')->where('status',2)->latest()->paginate(50);
         }
         else{
            $withdraws = Withdraw::with('user')->with('withdrawmethod')->where('status',2)->latest()->paginate(50);
         }
        
        return view('admin.withdraw.withdraw_request', compact('withdraws','request'));
    }

    public function withdrawSearchRejected(Request $request){
        if ($request->type == 'duration') {
            $start_date   = $request->start_date . " 00:00:00";
            $end_date     = $request->end_date . " 23:59:59";
            if ($request->start_date == '' &&  $request->end_date == '') {
                $withdraws = Withdraw::with('user')->with('withdrawmethod')->where('status', 0)->paginate(10);
            }elseif ($request->start_date == '' && $request->end_date != '') {
                $withdraws = Withdraw::with('user')->with('withdrawmethod')->where('created_at','<', $request->end_date)->where('status', 0)->paginate(10);
            }elseif ($request->start_date != '' && $request->end_date == '') {
                $withdraws = Withdraw::with('user')->with('withdrawmethod')->where('created_at','>', $request->start_date)->where('status', 0)->paginate(10);
            }else{
                $withdraws = Withdraw::with('user')->with('withdrawmethod')->whereBetween('created_at', [$start_date, $end_date])->where('status', 0)->paginate(10);
            }
            return view('admin.withdraw.withdraw_request', compact('withdraws'));
        }elseif ($request->type == 'account_number') {
            $data = $request->q;
            $withdraws = Withdraw::with('user')->with('withdrawmethod')->whereHas('user', function ($query) use ($data) {
                return $query->where('account_number', 'LIKE', "%$data%");
             })->where('status', 0)->paginate(10);
             return view('admin.withdraw.withdraw_request', compact('withdraws'));
        }elseif ($request->type == 'withdraw_method') {
            $data = $request->q;
            $withdraws = Withdraw::with('user')->with('withdrawmethod')->whereHas('withdrawmethod', function ($query) use ($data) {
                return $query->where('title', 'LIKE', "%$data%");
             })->where('status', 0)->paginate(10);
             return view('admin.withdraw.withdraw_request', compact('withdraws'));
        }
    }
    public function withdrawSearchApproved(Request $request){
        if ($request->type == 'duration') {
            $start_date   = $request->start_date . " 00:00:00";
            $end_date     = $request->end_date . " 23:59:59";
            if ($request->start_date == '' &&  $request->end_date == '') {
                $withdraws = Withdraw::with('user')->with('withdrawmethod')->where('status', 1)->paginate(10);
            }elseif ($request->start_date == '' && $request->end_date != '') {
                $withdraws = Withdraw::with('user')->with('withdrawmethod')->where('created_at','<', $request->end_date)->where('status', 1)->paginate(10);
            }elseif ($request->start_date != '' && $request->end_date == '') {
                $withdraws = Withdraw::with('user')->with('withdrawmethod')->where('created_at','>', $request->start_date)->where('status', 1)->paginate(10);
            }else{
                $withdraws = Withdraw::with('user')->with('withdrawmethod')->whereBetween('created_at', [$start_date, $end_date])->where('status', 1)->paginate(10);
            }
            return view('admin.withdraw.withdraw_request', compact('withdraws'));
        }elseif ($request->type == 'account_number') {
            $data = $request->q;
            $withdraws = Withdraw::with('user')->with('withdrawmethod')->whereHas('user', function ($query) use ($data) {
                return $query->where('account_number', 'LIKE', "%$data%");
             })->where('status', 1)->paginate(10);
             return view('admin.withdraw.withdraw_request', compact('withdraws'));
        }elseif ($request->type == 'withdraw_method') {
            $data = $request->q;
            $withdraws = Withdraw::with('user')->with('withdrawmethod')->whereHas('withdrawmethod', function ($query) use ($data) {
                return $query->where('title', 'LIKE', "%$data%");
             })->where('status', 1)->paginate(10);
             return view('admin.withdraw.withdraw_request', compact('withdraws'));
        }
    }
    public function withdrawSearch(Request $request){

        if ($request->type == 'duration') {
            $start_date   = $request->start_date . " 00:00:00";
            $end_date     = $request->end_date . " 23:59:59";
            if ($request->start_date == '' &&  $request->end_date == '') {
                $withdraws = Withdraw::with('user')->with('withdrawmethod')->where('status', 2)->paginate(10);
            }elseif ($request->start_date == '' && $request->end_date != '') {
                $withdraws = Withdraw::with('user')->with('withdrawmethod')->where('created_at','<', $request->end_date)->paginate(10);
            }elseif ($request->start_date != '' && $request->end_date == '') {
                $withdraws = Withdraw::with('user')->with('withdrawmethod')->where('created_at','>', $request->start_date)->paginate(10);
            }else{
                $withdraws = Withdraw::with('user')->with('withdrawmethod')->whereBetween('created_at', [$start_date, $end_date])->paginate(10);
            }
            return view('admin.withdraw.withdraw_request', compact('withdraws','request'));
        }elseif ($request->type == 'account_number') {
            $data = $request->q;
            $withdraws = Withdraw::with('user')->with('withdrawmethod')->whereHas('user', function ($query) use ($data) {
                return $query->where('account_number', 'LIKE', "%$data%");
                })->paginate(10);
                return view('admin.withdraw.withdraw_request', compact('withdraws','request'));
        }elseif ($request->type == 'withdraw_method') {
            $data = $request->q;
            $withdraws = Withdraw::with('user')->with('withdrawmethod')->whereHas('withdrawmethod', function ($query) use ($data) {
                return $query->where('title', 'LIKE', "%$data%");
                })->paginate(10);
                return view('admin.withdraw.withdraw_request', compact('withdraws','request'));
        }
    }

    public function approved_withdraw(){
        if (!Auth()->user()->can('withdraw.request.approved')) {
            return abort(401);
         } 
        $withdraws = Withdraw::with('user')->where('status', 1)->latest()->paginate(10);
        return view('admin.withdraw.approved_withdraw', compact('withdraws'));
    }

    public function rejected_withdraw(){
        if (!Auth()->user()->can('withdraw.request.rejected')) {
            return abort(401);
         } 
        $withdraws = Withdraw::with('user')->where('status', 0)->latest()->paginate(10);
        return view('admin.withdraw.rejected_withdraw', compact('withdraws'));
    }

    public function withdrawRejected($id){
        $withdraw_rejected = Withdraw::findOrFail($id);
        $withdraw_rejected->status = 0;
        $withdraw_rejected->save();
        
        $user = User::findOrFail($withdraw_rejected->user_id);
        $user->balance = $user->balance + $withdraw_rejected->amount_usd;
        $user->save();
        return redirect()->route('admin.withdraw_request')->with('message', 'Rejected Successfully');
    }

    public function withdrawApproved($id){
        $withdraw_approved = Withdraw::findOrFail($id);
        $withdraw_approved->status = 1;
        $withdraw_approved->save();
        return redirect()->route('admin.withdraw_request')->with('message', 'Withdraw Approved');
    }

    public function withdraw_method_create(){
        if (!Auth()->user()->can('withdraw.method.create')) {
            return abort(401);
         } 
        return view('admin.withdraw.withdraw_method');
    }

}
