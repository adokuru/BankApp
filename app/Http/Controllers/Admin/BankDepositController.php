<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Depositmeta;
use App\Models\Getway;
use App\Models\Term;
use App\Models\Termgetway;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class BankDepositController extends Controller
{
    public function manualGatewayCreate()
    {
        if (!Auth()->user()->can('deposit.manual.gateway.create')) {
           return abort(401);
        }
        $currencies = Term::with('currencyMeta')->where('type', 'currency')->get();
        return view('admin.bank_deposit.create', compact('currencies'));
    }
    public function manualGatewayStore(Request $request){
        // return $request->all();
        $request->validate([
            'name'            => 'required',
            'deposit_min'     => 'required|min:1|lt:deposit_max',
            'deposit_max'     => 'required|gt:deposit_min',
            'charge_type'     => 'required',
            'currency'        => 'required',
            'status'          => 'required',
            'data'            => 'required',
        ]);

        
        
        // logo check
        $logo_path = $logo_name = '';
        if ($request->hasFile('logo')) {
            $logo      = $request->file('logo');
            $logo_name = hexdec(uniqid()) . '.' . $logo->getClientOriginalExtension();
            $logo_path = 'uploads/' . date('y/m/');
            $logo->move($logo_path, $logo_name);
        }
        // Withdraw Store
        $getway                  = new Getway();
        $getway->name            = $request->name;
        $getway->logo            = $logo_path . $logo_name;
        $getway->deposit_min     = $request->deposit_min;
        $getway->deposit_max     = $request->deposit_max;
        $getway->charge_type     = $request->charge_type;
        $getway->data            = $request->data;
        $getway->fix_charge      = ($request->charge_type == 'fixed' || $request->charge_type == 'both') ? ($request->fix_charge ?? 0) : 0;
        $getway->percent_charge  = ($request->charge_type == 'percentage' || $request->charge_type == 'both') ? ($request->percent_charge ?? 0) : 0;
        $getway->rate            = 10;
        $getway->type            = 0;
        $getway->status          = $request->status;
        $getway->save();

        $term_getway = new Termgetway();
        $data = [];
        foreach ($request->currency as $key => $value) {  //Currency as term id
            $data[] = [
                'term_id' => $value,
                'getway_id' => $getway->id
            ];
        }

        $term_getway->insert($data);
        
        return response()->json('Manual Getway Added Successfully!');
    }

    public function manualGatewayEdit($id){
        if (!Auth()->user()->can('deposit.manual.gateway.edit')) {
            return abort(401);
         }
        $currencies = Term::with('currencyMeta')->where('type', 'currency')->get();
        $manualGateway = Getway::with('term')->findOrFail($id);
        // return $manualGateway;
        return view('admin.bank_deposit.edit', compact('currencies','manualGateway'));
    }

    public function manualGatewayupdate($id, Request $request){
        $request->validate([
            'name'            => 'required',
            'deposit_min'     => 'required|min:1|lt:deposit_max',
            'deposit_max'     => 'required|gt:deposit_min',
            'charge_type'     => 'required',
            'currency'        => 'required',
            'status'          => 'required',
            'data'            => 'required',
        ]);
        $getway  = Getway::findOrFail($id);
        // logo check
        $logo_path = $logo_name = '';

        if ($request->hasFile('logo')) {
            if ($getway->logo != '') {
                unlink($getway->logo);
            }   
            $logo      = $request->file('logo');
            $logo_name = hexdec(uniqid()) . '.' . $logo->getClientOriginalExtension();
            $logo_path = 'uploads/' . date('y/m/');
            $logo->move($logo_path, $logo_name);
        }

        $getway->name            = $request->name;
        $getway->logo            = $logo_path . $logo_name;
        $getway->deposit_min     = $request->deposit_min;
        $getway->deposit_max     = $request->deposit_max;
        $getway->charge_type     = $request->charge_type;
        $getway->data            = $request->data;
        $getway->fix_charge      = ($request->charge_type == 'fixed' || $request->charge_type == 'both') ? ($request->fix_charge ?? 0) : 0;
        $getway->percent_charge  = ($request->charge_type == 'percentage' || $request->charge_type == 'both') ? ($request->percent_charge ?? 0) : 0;
        $getway->rate            = 10;
        $getway->type            = 0;
        $getway->status          = $request->status;
        $getway->save();

        Termgetway::where('getway_id', $getway->id)->delete();

        $data = [];
        foreach ($request->currency as $key => $value) {  //Currency as term id
            $data[] = [
                'term_id' => $value,
                'getway_id' => $getway->id
            ];
        }
        $termgetway = new Termgetway();
        $termgetway->insert($data);
        return response()->json('Manual Getway Updated Successfully!');
    }

    public function manualGatewayDelete($id){
        if (!Auth()->user()->can('deposit.manual.gateway.delete')) {
            return abort(401);
         }
        Getway::where('id', $id)->delete();
        Termgetway::where('getway_id', $id)->delete();
        return redirect()->route('admin.manual_gateway')->with('message','Deleted Successfully!');
    }

    public function index()
    {
        if (!Auth()->user()->can('bank.deposit.index')) {
            return abort(401);
         }
        $deposits = Deposit::with(['user', 'getway'])->where('type','manual')->paginate(10);
        return view('admin.bank_deposit.index', compact('deposits'));
    }

    public function manualDepositSearch(Request $request)
    {
        $data = $request->q;
        if ($request->type == 'account_number') {
            $deposits = Deposit::with('user')->whereHas('user', function ($query) use ($data) {
               return $query->where('account_number', 'LIKE', "%$data%");
            })->paginate(10);
            return view('admin.bank_deposit.index', compact('deposits'));
        }
        if ($request->type == 'trx') {
            $deposits = Deposit::where('trx', 'LIKE', "%$data%")->paginate(10);
            return view('admin.bank_deposit.index', compact('deposits'));
        } 
        
    }

    public function approve_manual_deposit()
    {
        if (!Auth()->user()->can('bank.deposit.approved')) {
            return abort(401);
         }
        $deposits = Deposit::with(['user', 'getway'])->where([['type','manual'],['status', 1]])->paginate(10);
        return view('admin.bank_deposit.approve_manual_deposit', compact('deposits'));
    }

    public function manualDepositSearchApprove(Request $request)
    {
        $data = $request->q;
        if ($request->type == 'account_number') {
            $deposits = Deposit::where([['type','manual'],['status', 1]])->with('user')->whereHas('user', function ($query) use ($data) {
               return $query->where('account_number', 'LIKE', "%$data%");
            })->paginate(10);
            return view('admin.bank_deposit.approve_manual_deposit', compact('deposits'));
        }
        if ($request->type == 'trx') {
            $deposits = Deposit::where('trx', 'LIKE', "%$data%")->paginate(10);
            return view('admin.bank_deposit.approve_manual_deposit', compact('deposits'));
        } 
        
    }

    public function manual_gateway()
    { 
        if (!Auth()->user()->can('deposit.manual.gateway.index')) {
            return abort(401);
        }
        $manualGateways = Getway::where('type', '0')->latest()->paginate(10);
        return view('admin.bank_deposit.manual_gateway',compact('manualGateways'));
    }

    public function pending_manual_deposit()
    {
        if (!Auth()->user()->can('deposit.manual.gateway.index')) {
            return abort(401);
         }
        $deposits = Deposit::with(['user', 'getway'])->where([['type','manual'],['status', 2]])->paginate(10);
        return view('admin.bank_deposit.pending_manual_deposit', compact('deposits'));
    }

    public function manualDepositSearchPending(Request $request)
    {
        $data = $request->q;
        if ($request->type == 'account_number') {
            $deposits = Deposit::where([['type','manual'],['status', 2]])->with('user')->whereHas('user', function ($query) use ($data) {
               return $query->where('account_number', 'LIKE', "%$data%");
            })->paginate(10);
            return view('admin.bank_deposit.pending_manual_deposit', compact('deposits'));
        }
        if ($request->type == 'trx') {
            $deposits = Deposit::where('trx', 'LIKE', "%$data%")->paginate(10);
            return view('admin.bank_deposit.pending_manual_deposit', compact('deposits'));
        } 
        
    }

    public function reject_manual_deposit()
    {
        if (!Auth()->user()->can('deposit.manual.gateway.index')) {
            return abort(401);
         }
        $deposits = Deposit::with(['user', 'getway'])->where([['type','manual'],['status', 0]])->paginate(10);
        return view('admin.bank_deposit.reject_manual_deposit', compact('deposits'));
    }

    public function manualDepositeUpdate($id, Request $request)
    {
      
        if ($request->type == 0) {
            $deposit = Deposit::findOrFail($id);
            $deposit->status = $request->type;
            $deposit->save();
            return redirect()->back()->with('message', 'Manual Deposit Rejected!!');
        }else {
            $deposit = Deposit::findOrFail($id);
            $deposit->status = $request->type;
            $deposit->save();
            $user = User::where('id', $deposit->user_id)->first();
            $user->balance = $user->balance + $deposit->amount;
            $user->save();
            return redirect()->back()->with('message', 'Manual Deposit Approved!!');
        }
        
    }
    public function manualDepositSearchReject(Request $request)
    {
        $data = $request->q;
        if ($request->type == 'account_number') {
            $deposits = Deposit::where([['type','manual'],['status', 0]])->with('user')->whereHas('user', function ($query) use ($data) {
               return $query->where('account_number', 'LIKE', "%$data%");
            })->paginate(10);
            return view('admin.bank_deposit.reject_manual_deposit', compact('deposits'));
        }
        if ($request->type == 'trx') {
            $deposits = Deposit::where('trx', 'LIKE', "%$data%")->paginate(10);
            return view('admin.bank_deposit.reject_manual_deposit', compact('deposits'));
        } 
        
    }


    public function deposit_view($id)
    {
        if (!Auth()->user()->can('bank.deposit.view')) {
         return abort(401);
        }

        $info=Deposit::where('type','manual')->with('user','getway','meta')->findorFail($id);
        return view('admin.bank_deposit.show', compact('info'));
    }


   

}
