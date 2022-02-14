<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use Illuminate\Http\Request;
use App\Models\Getway;
use App\Models\User;
use Auth;
class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth()->user()->can('deposit.index')) {
            return abort(401);
        }
        $deposits = Deposit::with(['user', 'getway'])->where('type','!=','manual')->paginate(10);
        return view('admin.deposits.index',compact('deposits'));
    }

    public function depositComplete()
    {
        if (!Auth()->user()->can('deposit.complete')) {
            return abort(401);
        }
        $deposits = Deposit::with(['user', 'getway'])->where([
            ['status', 1],
            ['type','!=','manual']
        ])->paginate(10);
        return view('admin.deposits.complete', compact('deposits'));
    }

    public function update(Request $request, $id)
    {
        $deposit = Deposit::findOrFail($id);
        $user = User::findOrFail($deposit->user_id);
        $user->balance = $user->balance - $deposit->amount;
        $user->save();
        $deposit->status = 0;
        $deposit->save();
        return redirect()->back()->with('message', 'Deposit Cancelled Successfully!');
    }

    public function depositSearch(Request $request)
    {
        $data = $request->q;
        if ($request->type == 'account_number') {
            $deposits = Deposit::with('user')->whereHas('user', function ($query) use ($data) {
               return $query->where('account_number', 'LIKE', "%$data%");
            })->paginate(10);
            return view('admin.deposits.index', compact('deposits'));
        }
        if ($request->type == 'trx') {
            $deposits = Deposit::where('trx', 'LIKE', "%$data%")->paginate(10);
            return view('admin.deposits.index', compact('deposits'));
        }

    }

    //Automatic Gateway List
    public function depositAutomaticGateway()
    {
        if (!Auth()->user()->can('deposit.automatic.gateway.index')) {
            return abort(401);
        }
        $automaticGateways = Getway::latest()->paginate(50);
        return view('admin.deposits.automatic_gateway',compact('automaticGateways'));
    }

    //Automatic Gateway Edit
    public function depositAutomaticGatewayEdit($id)
    {
        if (!Auth()->user()->can('deposit.automatic.gateway.edit')) {
            return abort(401);
        }
        $gateway = Getway::findOrFail($id);
        return view('admin.deposits.automatic_gateway_edit',compact('gateway'));
    }

    //Automatic Gateway Update
    public function depositAutomaticGatewayUpdate($id, Request $request)
    {  
        
        // Validate
        $request->validate([
            'name'            => 'required|unique:getways,name,'.$id,
            'logo'            => 'image|max:1024',
            'rate'            => 'required',
            'deposit_min'     => 'required|min:1|lt:deposit_max',
            'deposit_max'     => 'required|gt:deposit_min',
            'charge_type'     => 'required'
        ]);
        $getway = Getway::findOrFail($id);
        // logo check
        if ($request->hasFile('logo')) {   
            // unlink($getway->logo);
            $logo      = $request->file('logo');
            $logo_name = hexdec(uniqid()) . '.' . $logo->getClientOriginalExtension();
            $logo_path = 'uploads/' . date('y/m/');
            $logo->move($logo_path, $logo_name);
            $getway->logo    = $logo_path . $logo_name;
        }
        // Automatic Payment Gateway update
        $getway->name    = $request->name;
        $getway->rate = $request->rate;
        $getway->deposit_min = $request->deposit_min;
        $getway->charge_type = $request->charge_type;
        $getway->status = $request->status;
        $getway->fix_charge =  ($request->charge_type == 'fixed' || $request->charge_type == 'both') ? ($request->fix_charge ?? 0) : 0;
        $getway->percent_charge = ($request->charge_type == 'percentage' || $request->charge_type == 'both') ? ($request->percent_charge ?? 0) : 0;
        $getway->data = json_encode($request->data);
        $getway->save();

        return response()->json('Payment Gateway Updated Successfully');
    }

    //Automatic Gateway Delete
    public function depositAutomaticGatewayDelete($id)
    {
        if (!Auth()->user()->can('deposit.automatic.gateway.delete')) {
            return abort(401);
        }
        $gateway = Getway::findOrFail($id);
        $gateway->delete();
        return redirect()->back()->with('success', 'Successfully Deleted'); 
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        if (!Auth()->user()->can('deposit.create')) {
         return abort(401);
         }
        return view('admin.deposits.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
