<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Term as Country;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth()->user()->can('country.index')) {
            return abort(401);
         }
        $countries = Country::where('type','country')->latest()->paginate(10);
        return view('admin.country.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth()->user()->can('country.create')) {
           return abort(401);
        }
        return view('admin.country.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate
        $request->validate([
            'title'   => 'required',
            'status'  => 'required'
        ]);
        //currency store
        $country = new Country();
        $country->title          = $request->title;
        $country->slug           = Str::slug($request->title);
        $country->status         = $request->status;
        $country->type           = 'country';
        $country->featured       = 1;
        $country->save();

        return response()->json('Country Added!');
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
        if (!Auth()->user()->can('country.edit')) {
            return abort(401);
        }
        $country = Country::findOrFail($id);
        return view('admin.country.edit', compact('country'));
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
        // if (!Auth()->user()->can('country.update')) {
        //     return abort(401);
        // }
        //Validate
        $request->validate([
            'title'   => 'required',
            'status'  => 'required'
        ]);
        //country store
        $country = Country::findOrFail($id);
        $country->title          = $request->title;
        $country->slug           = Str::slug($request->title);
        $country->status         = $request->status;
        $country->save();

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
        if (!Auth()->user()->can('country.delete')) {
            return abort(401);
        }
        $country = Country::findOrFail($id);
        $country->delete();
        return redirect()->back()->with('success', 'Successfully Deleted!');   
    }
}
