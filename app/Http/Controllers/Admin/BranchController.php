<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Term;
use App\Models\Termmeta;
use Illuminate\Http\Request;
use Illuminate\Support\str;
use Illuminate\Support\Facades\Auth;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (!Auth()->user()->can('branch.index')) {
            return abort(401);
         }
        $terms = Term::with('meta')->where('type', 'branch')->paginate(20);

        return view('admin.branch.index', compact('terms'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth()->user()->can('branch.create')) {
            return abort(401);
         }
        return view('admin.branch.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Branch Validate
        $request->validate([
            'branch_name'   => 'required',
            'phone_nmuber'  => 'required',
            'email_address' => 'required|email',
            'address'       => 'required',
            'post_code'     => 'required',
            'is_featured'   => 'required',
            'status'        => 'required'
        ]);

        // Data
        $data = [
            'phone_number'  => $request->phone_nmuber,
            'email_address' => $request->email_address,
            'address'       => $request->address,
            'post_code'     => $request->post_code,
            'description'   => $request->description,
        ];

        // Branch Store
        $branch           = new Term();
        $branch->title    = $request->branch_name;
        $branch->slug     = str::slug($request->branch_name, '-');
        $branch->type     = 'branch';
        $branch->status   = $request->status;
        $branch->featured = $request->is_featured;
        $branch->save();

        // Termmeta Store
        $branch_meta          = new Termmeta();
        $branch_meta->term_id = $branch->id;
        $branch_meta->key     = 'content';
        $branch_meta->value   = json_encode($data);
        $branch_meta->save();

        return response()->json('Branch Added Successfully');
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
        if (!Auth()->user()->can('branch.edit')) {
            return abort(401);
        }
        // Branch Edit
        $branch_edit = Term::findOrFail($id);
        return view('admin.branch.edit', compact('branch_edit'));
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
        // Branch Validate
        $request->validate([
            'branch_name'   => 'required',
            'phone_nmuber'  => 'required',
            'email_address' => 'required|email',
            'address'       => 'required',
            'post_code'     => 'required',
        ]);

        // Data
        $data = [
            'phone_number'  => $request->phone_nmuber,
            'email_address' => $request->email_address,
            'address'       => $request->address,
            'post_code'     => $request->post_code,
            'description'   => $request->description,
            'is_featured'   => 'required',
            'status'        => 'required'
        ];

        // Branch Update
        $branch_update           = Term::findOrFail($id);
        $branch_update->title    = $request->branch_name;
        $branch_update->slug     = str::slug($request->branch_name, '-');
        $branch_update->type     = 'branch';
        $branch_update->status   = $request->status;
        $branch_update->featured = $request->is_featured;
        $branch_update->save();

        // Termmeta Update
        $branch_meta_update          = Termmeta::where('term_id', $id)->first();
        $branch_meta_update->value   = json_encode($data);
        $branch_meta_update->save();

        return response()->json('Branch Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth()->user()->can('branch.delete')) {
            return abort(401);
         }
        // Branch Delete
        $branch_delete = Term::findOrFail($id);
        $branch_delete->delete();
        return redirect()->back()->with('success', 'Successfully Deleted'); 
    }
}
