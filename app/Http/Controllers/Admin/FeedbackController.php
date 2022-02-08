<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Term;
use App\Models\Termmeta;
use Illuminate\Http\Request;
use Illuminate\Support\str;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth()->user()->can('feedbacks.index')) {
            return abort(401);
        }
        $feedbacks = Term::where('type', 'feedback')->paginate(20);
        return view('admin.feedback.index', compact('feedbacks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth()->user()->can('feedbacks.create')) {
            return abort(401);
        }
        return view('admin.feedback.create');
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
            'name'          => 'required',
            'client_image'  => 'image|max:2048',
            'client_review' => 'required',
        ]);

        // logo check
        if ($request->hasFile('client_image')) {
            $client_image      = $request->file('client_image');
            $client_image_name = hexdec(uniqid()) . '.' . $client_image->getClientOriginalExtension();
            $client_image_path = 'uploads/' . date('y/m/');
            $client_image->move($client_image_path, $client_image_name);
        }

        // data
        $data = [
            'client_image'    => $client_image_path . $client_image_name,
            'client_review'   => $request->client_review,
            'client_position' => $request->client_position,
        ];

        // feedback Store
        $feedback_store           = new Term();
        $feedback_store->title    = $request->name;
        $feedback_store->slug     = str::slug($request->name, '-');
        $feedback_store->type     = 'feedback';
        $feedback_store->status   = $request->status;
        $feedback_store->featured = 1;
        $feedback_store->save();

        // Termmeta Store
        $feedback_meta_store          = new Termmeta();
        $feedback_meta_store->term_id = $feedback_store->id;
        $feedback_meta_store->key     = 'feedback';
        $feedback_meta_store->value   = json_encode($data);
        $feedback_meta_store->save();

        return response()->json('feedback Added Successfully');
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
        if (!Auth()->user()->can('feedbacks.edit')) {
            return abort(401);
        }
        $feedback_edit = Term::findOrFail($id);
        return view('admin.feedback.edit', compact('feedback_edit'));
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
            'name'          => 'required',
            'client_image'  => 'image|max:2048',
            'client_review' => 'required',
        ]);
         $feedback_meta_update        = Termmeta::where('term_id', $id)->first();
         $json=json_decode($feedback_meta_update->value);
        // feedback Update
        $feedback_update = Term::findOrFail($id);
        $client_img_meta  = json_decode($feedback_update->feedback->value);
       
        // logo check
        if ($request->hasFile('client_image')) {
            unlink($client_img_meta->client_image);
            $client_image      = $request->file('client_image');
            $client_image_name = hexdec(uniqid()) . '.' . $client_image->getClientOriginalExtension();
            $client_image_path = 'uploads/' . date('y/m/');
            $client_image->move($client_image_path, $client_image_name);

            $img=$client_image_path.$client_image_name;
        }
        else{
            $img=$json->client_image;
        }

        // data
        $data = [
            'client_image'    => $img,
            'client_review'   => $request->client_review,
            'client_position' => $request->client_position,
        ];

        $feedback_update->title    = $request->name;
        $feedback_update->slug     = str::slug($request->name, '-');
        $feedback_update->type     = 'feedback';
        $feedback_update->status   = $request->status;
        $feedback_update->featured = 1;
        $feedback_update->save();

        // Termmeta Store
       
        $feedback_meta_update->value = json_encode($data);
        $feedback_meta_update->save();

        return response()->json('feedback Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth()->user()->can('feedbacks.delete')) {
            return abort(401);
        }
        $feedback_destory = Term::with('feedback')->findOrFail($id);
        $feedback_destory->delete();
        if(!empty($feedback_destory->feedback)){
            $img=json_decode($feedback_destory->feedback->value);
            if(!empty($img->client_image)){
                if(file_exists($img->client_image)){
                    unlink($img->client_image);
                }
            }
        }
        return redirect()->back()->with('success', 'Successfully Deleted'); 
    }
}
