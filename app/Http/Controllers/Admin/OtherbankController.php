<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Term;
use App\Models\Termmeta;
use Illuminate\Http\Request;


class OtherbankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth()->user()->can('otherbank.index')) {
            return abort(401);
        }
        $banks = Bank::with('country')->latest()->paginate(10);
        return view('admin.otherbank.index', compact('banks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth()->user()->can('otherbank.create')) {
            return abort(401);
        }
        $countries = Term::where([
            ['type', 'country'],
            ['status', 1],
        ])->get();
        return view('admin.otherbank.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if (!Auth()->user()->can('otherbank.store')) {
        //     return abort(401);
        //  }
        $request->validate([
            'name'          => 'required',
            'min_amount'     => 'required|min:1|lt:max_amount',
            'max_amount'     => 'required|gt:min_amount',
            'charge_type'   => 'required',
            'country'       => 'required',
            'period'        => 'required'
        ]);
        
        $bank = new Bank();
        $bank->name           = $request->name;
        $bank->min_amount     = $request->min_amount;
        $bank->max_amount     = $request->max_amount;
        $bank->charge_type    = $request->charge_type;
        $bank->term_id        = $request->country;
        $bank->fix_charge     = ($request->charge_type == 'fixed' || $request->charge_type == 'both') ? ($request->fix_charge ?? 0) : 0;
        $bank->percent_charge = ($request->charge_type == 'percentage' || $request->charge_type == 'both') ? ($request->percent_charge ?? 0) : 0;
        $bank->period = $request->period;
        $bank->save();

        return response()->json('Bank Successfully Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Bank $bank)
    {
        // dd($bank);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth()->user()->can('otherbank.edit')) {
            return abort(401);
        }
        $bank = Bank::findOrFail($id);
        $countries = Term::where([
            ['type', 'country'],
            ['status', 1],
        ])->get();
        return view('admin.otherbank.edit', compact('bank','countries'));
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
        // if (!Auth()->user()->can('otherbank.update')) {
        //     return abort(401);
        //  }
        $request->validate([
            'name'          => 'required',
            'min_amount'     => 'required|min:1|lt:max_amount',
            'max_amount'     => 'required|gt:min_amount',
            'charge_type'   => 'required',
            'period'        => 'required',
            'country'        => 'required'
        ]);

        $bank = Bank::findOrFail($id); 
        $bank->name     = $request->name;
        $bank->min_amount     = $request->min_amount;
        $bank->max_amount     = $request->max_amount;
        $bank->charge_type    = $request->charge_type;
        $bank->term_id        = $request->country;
        $bank->fix_charge     = ($request->charge_type == 'fixed' || $request->charge_type == 'both') ? ($request->fix_charge ?? 0) : 0;
        $bank->percent_charge = ($request->charge_type == 'percentage' || $request->charge_type == 'both') ? ($request->percent_charge ?? 0) : 0;
        $bank->period         = $request->period;
        $bank->status         = $request->status;
        $bank->save();

        return response()->json('Bank Successfully Updated!');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth()->user()->can('otherbank.delete')) {
            return abort(401);
         }
        $bank = Bank::findOrFail($id);
        $bank->delete();
        return redirect()->back()->with('success', 'Successfully Deleted');   
    }
}
