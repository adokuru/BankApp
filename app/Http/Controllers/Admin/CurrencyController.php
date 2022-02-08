<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Term;
use App\Models\Termmeta;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth()->user()->can('currency.index')) {
            return abort(401);
         }
        
        $currencies = Term::with('currencyMeta')->where('type', 'currency')->paginate(10);
        return view('admin.currency.index', compact('currencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth()->user()->can('currency.create')) {
            return abort(401);
         }
        return view('admin.currency.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if (!Auth()->user()->can('currency.store')) {
        //     return abort(401);
        //  }
        //Validate
        $request->validate([
            'title'   => 'required',
            'slug'    => 'required',
            'logo'    => 'image|max:1024',
        ]);
        $logofile = '';
        // logo check
        if ($request->hasFile('logo')) {
            $logo      = $request->file('logo');
            $logo_name = hexdec(uniqid()) . '.' . $logo->getClientOriginalExtension();
            $logo_path = 'uploads/' . date('y/m/');
            $logo->move($logo_path, $logo_name);
            $logofile = $logo_path . $logo_name;
        }
         // Data
        $data = [
            'logo'   => $logofile,
        ];
        //currency store
        $currency = new Term();
        $currency->title          = $request->title;
        $currency->slug           = $request->slug;
        $currency->status         = $request->status;
        $currency->type           = 'currency';
        $currency->featured       = 1;
        $currency->save();

        // Currency Terms Meta Store
        $terms_meta          = new Termmeta();
        $terms_meta->term_id = $currency->id;
        $terms_meta->key     = 'content';
        $terms_meta->value   = json_encode($data);
        $terms_meta->save();

        return response()->json('Currency Added!');
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
        if (!Auth()->user()->can('currency.edit')) {
            return abort(401);
        }
        $currency = Term::findOrFail($id);
        return view('admin.currency.edit', compact('currency'));
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
        // if (!Auth()->user()->can('currency.update')) {
        //     return abort(401);
        // }
        //Validate
        $request->validate([
            'title'   => 'required',
            'slug'    => 'required',
            'logo'    => 'image|max:1024',
        ]);

        $currency_meta_update        = Termmeta::where('term_id', $id)->first();
        // logo check
        if ($request->hasFile('logo')) {
            $logo      = $request->file('logo');
            $logo_name = hexdec(uniqid()) . '.' . $logo->getClientOriginalExtension();
            $logo_path = 'uploads/' . date('y/m/');
            $logo->move($logo_path, $logo_name);

             // Data
             $data = [
                'logo'   => $logo_path . $logo_name,
            ];

             // Payments Gateway Terms Meta Store
            $prev_logo=json_decode($currency_meta_update->content);
            if(!empty($prev_logo->logo)){
                if (file_exists($prev_logo->logo)) {
                    unlink($prev_logo->logo);
                }
            }
            $currency_meta_update->value = json_encode($data);
            $currency_meta_update->save();
        }
        

        //currency store
        $currency = Term::findOrFail($id);
        $info = json_decode($currency->meta->value);

        $currency->title          = $request->title;
        $currency->slug           = $request->slug;
        $currency->status         = $request->status;
        $currency->save();

       

        return response()->json('Currency Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth()->user()->can('currency.delete')) {
            return abort(401);
        }
        $currency = Term::findOrFail($id);
        $currency->delete();
        return redirect()->back()->with('success', 'Successfully Deleted!');   
    }
}
