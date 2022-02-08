<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Term;
use App\Models\Termmeta;
use Illuminate\Support\Str;
class HowItWorksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth()->user()->can('howitworks.index')) {
            return abort(401);
         }
        
        $howitworks = Term::where('type','howitworks')->with('howitworksMeta')->latest()->paginate(10);
        return view('admin.howitworks.index', compact('howitworks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth()->user()->can('howitworks.create')) {
            return abort(401);
         }
        return view('admin.howitworks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if (!Auth()->user()->can('howitworks.store')) {
        //     return abort(401);
        //  }
         // Validate
         $request->validate([
            'title' => 'required',
            'image' => 'image|max:3062',
            'status'=> 'required',
        ]);
        $image_path = $image_name = '';
        // Image Check
        if ($request->hasFile('image')) {
            $image      = $request->file('image');
            $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $image_path = 'uploads/' . date('y/m/');
            $image->move($image_path, $image_name); 
        }

        // Data
        $data = [
            'description' => $request->description,
            'image'   => $image_path.$image_name,
        ];

        // how it works Data Store
        $howitworks           = new Term();
        $howitworks->title    = $request->title;
        $howitworks->slug     = Str::slug($request->title);
        $howitworks->type     = 'howitworks';
        $howitworks->status   = $request->status;
        $howitworks->featured = 1;
        $howitworks->save();

        // how it works Meta data store
        $howitworks_meta          = new Termmeta();
        $howitworks_meta->term_id = $howitworks->id;
        $howitworks_meta->key     = 'howitworks';
        $howitworks_meta->value   = json_encode($data);
        $howitworks_meta->save();

        return response()->json('How it works Added Successfully');
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
        if (!Auth()->user()->can('howitworks.edit')) {
            return abort(401);
        }
        $howitworks = Term::findOrFail($id);
        return view('admin.howitworks.edit', compact('howitworks'));
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
        
        $howitworks = Term::with('howitworksMeta')->findOrFail($id);

        $image_path = $image_name = '';
        // Image Check
        if ($request->hasFile('image')) {
            $image      = $request->file('image');
            $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $image_path = 'uploads/' . date('y/m/');
            $image->move($image_path, $image_name);

            $data = [
                'description' => $request->description,
                'image'   => $image_path.$image_name,
            ];

        }else{
            // Data
            $imagedata = json_decode($howitworks->howitworksMeta->value);
            $data = [
                'description' => $request->description,
                'image'   => $imagedata->image,
            ];
        }

        

        // how it works Data Store
        
        $howitworks->title    = $request->title;
        $howitworks->slug     = Str::slug($request->title);
        $howitworks->type     = 'howitworks';
        $howitworks->status   = $request->status;
        $howitworks->featured = 1;
        $howitworks->save();

        // how it works Meta data store
        $howitworks_meta          = Termmeta::where('term_id', $id)->first();
        $howitworks_meta->term_id = $howitworks->id;
        $howitworks_meta->key     = 'howitworks';
        $howitworks_meta->value   = json_encode($data);
        $howitworks_meta->save();

        return response()->json('How it work updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth()->user()->can('howitworks.delete')) {
            return abort(401);
        }
        $howitworks = Term::findOrFail($id);
        $howitworks->delete();
        return redirect()->back()->with('success', 'Successfully Deleted'); 
    }
}
