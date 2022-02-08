<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Term;
use App\Models\Termmeta;
use Illuminate\Http\Request;
use Illuminate\Support\str;

class PaymentGatewayController extends Controller
{
    // payment gateway index
    public function paymentGatewayIndex()
    {
        if (!Auth()->user()->can('payment_gateway.index')) {
            return abort(401);
         }
        $payments_gateway = Term::with('paymentMeta')->where('type', 'payment_gateway')->paginate(20);
        return view('admin.paymentgateway.index', compact('payments_gateway'));
    }

    // payment gateway create
    public function paymentGatewayCreate()
    {
        if (!Auth()->user()->can('payment_gateway.create')) {
            return abort(401);
         }
        return view('admin.paymentgateway.create');
    }

    // Payment Gateway Store
    public function paymentGatewayStore(Request $request)
    {
        // Validate
        $request->validate([
            'name'            => 'required',
            'logo'            => 'required|image|max:1024',
            'rate'            => 'required',
            'payment_gateway' => 'required',
            'min_amount'     => 'required|min:1|lt:max_amount',
            'max_amount'     => 'required|gt:min_amount',
            'charge_type'     => 'required',
        ]);
        // logo check
        if ($request->hasFile('logo')) {
            $logo      = $request->file('logo');
            $logo_name = hexdec(uniqid()) . '.' . $logo->getClientOriginalExtension();
            $logo_path = 'uploads/' . date('y/m/');
            $logo->move($logo_path, $logo_name);
        }
        
        // Data
        $data = [
            'logo'            => $logo_path . $logo_name,
            'rate'            => $request->rate,
            'payment_gateway' => $request->payment_gateway,
            'min_amount'      => $request->min_amount,
            'max_amount'      => $request->max_amount,
            'charge_type'     => $request->charge_type,
            'fixed_charge'    => ($request->charge_type == 'fixed' || $request->charge_type == 'both') ? ($request->fixed_charge ?? 0) : 0,
            'percent_charge'  => ($request->charge_type == 'percentage' || $request->charge_type == 'both') ? ($request->percent_charge ?? 0) : 0,
        ];
        // Payment Gateway Terms Store
        $terms           = new Term();
        $terms->title    = $request->name;
        $terms->slug     = str::slug($request->name, '-');
        $terms->type     = 'payment_gateway';
        $terms->status   = $request->status;
        $terms->featured = '1';
        $terms->save();

        // Payments Gateway Terms Meta Store
        $terms_meta          = new Termmeta();
        $terms_meta->term_id = $terms->id;
        $terms_meta->key     = 'content';
        $terms_meta->value   = json_encode($data);
        $terms_meta->save();
        
        return response()->json('Branch Added Successfully');
    }

    // Payment Gateway Edit
    public function paymentGatewayEdit($id)
    {
        if (!Auth()->user()->can('payment_gateway.edit')) {
            return abort(401);
         }
        $pg_edit_data = Term::findOrFail($id);
        return view('admin.paymentgateway.edit', compact('pg_edit_data'));
    }

    // Payment Gateway Update
    public function paymentGatewayUpdate(Request $request, $id)
    {
        // Validate
        $request->validate([
            'name'            => 'required',
            'logo'            => 'required|image|max:1024',
            'rate'            => 'required',
            'payment_gateway' => 'required',
            'min_amount'     => 'required|min:1|lt:max_amount',
            'max_amount'     => 'required|gt:min_amount',
            'charge_type'     => 'required',
        ]);
        $termUpdate           = Term::findOrFail($id);
        $info = json_decode($termUpdate->paymentMeta->value);
        // logo check
        if ($request->hasFile('logo')) {   
            unlink($info->logo);
            $logo      = $request->file('logo');
            $logo_name = hexdec(uniqid()) . '.' . $logo->getClientOriginalExtension();
            $logo_path = 'uploads/' . date('y/m/');
            $logo->move($logo_path, $logo_name);
        }
        // Data
        $data = [
            'logo'            => $logo_path . $logo_name,
            'rate'            => $request->rate,
            'payment_gateway' => $request->payment_gateway,
            'min_amount'      => $request->min_amount,
            'max_amount'      => $request->max_amount,
            'charge_type'     => $request->charge_type,
            'fixed_charge'    => ($request->charge_type == 'fixed' || $request->charge_type == 'both') ? ($request->fixed_charge ?? 0) : 0,
            'percent_charge'  => ($request->charge_type == 'percentage' || $request->charge_type == 'both') ? ($request->percent_charge ?? 0) : 0,
        ];

    
        // Payment Gateway Terms Store
        $termUpdate->title    = $request->name;
        $termUpdate->slug     = str::slug($request->name, '-');
        $termUpdate->type     = 'payment_gateway';
        $termUpdate->status   = $request->status;
        $termUpdate->featured = '1';
        $termUpdate->save();

        // Payments Gateway Terms Meta Store
        $terms_meta_update        = Termmeta::where('term_id', $id)->first();
        $terms_meta_update->value = json_encode($data);
        $terms_meta_update->save();

        return response()->json('Payment Gateway Updated Successfully');
    }
}
