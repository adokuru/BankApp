<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Term;
use App\Models\Termmeta;
use Illuminate\Http\Request;
use Illuminate\Support\str;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // pages view
        
        if (!Auth()->user()->can('page.index')) {
            abort(401);
        }
        $all_pages = Term::where('type', 'page')->paginate(20);
        return view('admin.pages.index', compact('all_pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth()->user()->can('page.create')) {
            abort(401);
        }
        // Page Create
        return view('admin.pages.create');
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
            'page_title' => 'required',
           
            'status'     => 'required',
        ]);

        

        // Data
        $data = [
            'page_excerpt' => $request->page_excerpt,
            'page_content' => $request->page_content,
            
        ];

        // Page Data Store
        $page_store           = new Term();
        $page_store->title    = $request->page_title;
        $page_store->slug     = Str::slug($request->page_title);
        $page_store->type     = 'page';
        $page_store->status   = $request->status;
        $page_store->featured = 1;
        $page_store->save();

        // page Meta data store
        $page_meta_store          = new Termmeta();
        $page_meta_store->term_id = $page_store->id;
        $page_meta_store->key     = 'page';
        $page_meta_store->value   = json_encode($data);
        $page_meta_store->save();

        return response()->json('Page Added Successfully');
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
        if (!Auth()->user()->can('page.edit')) {
            abort(401);
        }
        $page_edit = Term::findOrFail($id);
        return view('admin.pages.edit', compact('page_edit'));
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
            'page_title' => 'required',
            'status'     => 'required',
        ]);

        // page data update
        $page_update  = Term::findOrFail($id);
        
        // Data
        $data = [
            'page_excerpt' => $request->page_excerpt,
            'page_content' => $request->page_content,
            
        ];

        $page_update->title    = $request->page_title;
        $page_update->slug     = Str::slug($request->page_title);
        $page_update->type     = 'page';
        $page_update->status   = $request->status;
        $page_update->featured = 1;
        $page_update->save();

        // page Meta data store
        $page_meta_update          = Termmeta::where('term_id', $id)->first();
        $page_meta_update->value   = json_encode($data);
        $page_meta_update->save();

        return response()->json('Page Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth()->user()->can('page.delete')) {
            abort(401);
        }
        $page_destory = Term::findOrFail($id);
        $page_destory->delete();
        return redirect()->back()->with('success', 'Successfully Deleted'); 
    }
}
