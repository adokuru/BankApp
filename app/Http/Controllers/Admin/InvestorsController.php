<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Term;
use App\Models\Termmeta;
use Illuminate\Http\Request;
use Illuminate\Support\str;

class InvestorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth()->user()->can('investors.index')) {
            return abort(401);
        }
        $investors = Term::where('type', 'investor')->paginate(20);
        return view('admin.investor.index', compact('investors'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth()->user()->can('investors.create')) {
            return abort(401);
        }
        return view('admin.investor.create');
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
            'name'     => 'required',
            'position' => 'required',
            'image'     => 'required|image|max:1024',
        ]);

        // logo check
        if ($request->hasFile('image')) {
            $image      = $request->file('image');
            $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $image_path = 'uploads/' . date('y/m/');
            $image->move($image_path, $image_name);
        }

        // Data
        $data = [
            'position'      => $request->position,
            'facebook_link' => $request->facebook_link,
            'twitter_link'  => $request->twitter_link,
            'linkedin_link' => $request->linkedin_link,
            'image'         => $image_path . $image_name,
        ];

        // Term Data
        $investor_store           = new Term();
        $investor_store->title    = $request->name;
        $investor_store->slug     = str::slug($request->name, '-');
        $investor_store->type     = 'investor';
        $investor_store->status   = $request->status;
        $investor_store->featured = 1;
        $investor_store->save();

        // Term Meta Data
        $investor_meta_store          = new Termmeta();
        $investor_meta_store->term_id = $investor_store->id;
        $investor_meta_store->key     = 'investor';
        $investor_meta_store->value   = json_encode($data);
        $investor_meta_store->save();

        return response()->json('Investor Added Successfully');
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
        if (!Auth()->user()->can('investors.edit')) {
            return abort(401);
        }
        $investor_edit = Term::findOrFail($id);
        return view('admin.investor.edit', compact('investor_edit'));
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
            'name'     => 'required',
            'position' => 'required',
            'image'     => 'image|max:1024',
        ]);

        // Term Data
        $investor_update           = Term::findOrFail($id);
        $info_image = json_decode($investor_update->investor->value);

        // logo check
        if ($request->hasFile('image')) {
            unlink($info_image->image);
            $image      = $request->file('image');
            $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $image_path = 'uploads/' . date('y/m/');
            $image->move($image_path, $image_name);
            $img=$image_path.$image_name;
        }
        else{
            $img=$info_image->image;
        }

        // Data
        $data = [
            'position'      => $request->position,
            'facebook_link' => $request->facebook_link,
            'twitter_link'  => $request->twitter_link,
            'linkedin_link' => $request->linkedin_link,
            'image'         => $img,
        ];

        $investor_update->title    = $request->name;
        $investor_update->slug     = str::slug($request->name, '-');
        $investor_update->type     = 'investor';
        $investor_update->status   = $request->status;
        $investor_update->featured = 1;
        $investor_update->save();

        // Term Meta Data
        $investor_meta_update         = Termmeta::where('term_id', $id)->first();
        $investor_meta_update->value   = json_encode($data);
        $investor_meta_update->save();

        return response()->json('Investor Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth()->user()->can('investors.delete')) {
            return abort(401);
        }
        $investor_delete = Term::findOrFail($id);
        $info_image = json_decode($investor_delete->investor->value);
        if(!empty($info_image->image)){
            if (file_exists($info_image->image)) {
                unlink($info_image->image);
            }
        }
        $investor_delete->delete();
        return redirect()->back()->with('success', 'Successfully Deleted'); 
    }
}
