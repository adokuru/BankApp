<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Option;
use Illuminate\Http\Request;
use Auth;
class CounterController extends Controller
{
    public function counterIndex()
    {
        
        if (!Auth()->user()->can('counter')) {
            return abort(401);
         }
        $counter_data = Option::where('key', 'counter')->first();
        return view('admin.counter.counter_index', compact('counter_data'));
    }

    // Counter Update
    public function counterUpdate(Request $request, $id)
    {
        $counter_data = [
            'happy_customers_no'      => $request->happy_customers_no,
            'happy_customers_title'   => $request->happy_customers_title,
            'year_banking_no'         => $request->year_banking_no,
            'year_banking_title'      => $request->year_banking_title,
            'our_branches_no'         => $request->our_branches_no,
            'our_branches_title'      => $request->our_branches_title,
            'successfully_work_no'    => $request->successfully_work_no,
            'successfully_work_title' => $request->successfully_work_title
        ];

        $counter_data_in        =  Option::findOrFail($id);
        $counter_data_in->value = json_encode($counter_data);
        $counter_data_in->save();

        return response()->json('Counter Updated Successfully');
    }
}
