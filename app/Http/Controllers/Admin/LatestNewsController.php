<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Term;
use App\Models\Termmeta;
use Illuminate\Http\Request;
use Illuminate\Support\str;

class LatestNewsController extends Controller
{
    // Latest News
    public function index()
    {
        if (!Auth()->user()->can('news.index')) {
            return abort(401);
        }
        $all_news = Term::with('excerpt')->where('type', 'news')->paginate(20);
        return view('admin.latest_news.index', compact('all_news'));
    }

    // Latest News Create
    public function create()
    {
        if (!Auth()->user()->can('news.create')) {
           return abort(401);
        }
        return view('admin.latest_news.create');
    }

    // Latest News Store
    public function store(Request $request)
    {
        // Validate
        $request->validate([
            'name'        => 'required',
            'excerpt'     => 'required',
            'description' => 'required',
            'thum_image'  => 'required|image|max:2024',
        ]);
        // Thum Image Check
        if ($request->hasFile('thum_image')) {
            $thum_image      = $request->file('thum_image');
            $thum_image_name = hexdec(uniqid()) . '.' . $thum_image->getClientOriginalExtension();
            $thum_image_path = 'uploads/' . date('y/m/');
            $thum_image->move($thum_image_path, $thum_image_name);
        }

        // Term Data Store
        $latest_news_store           = new Term();
        $latest_news_store->title    = $request->name;
        $latest_news_store->slug     = str::slug($request->name, '-');
        $latest_news_store->type     = 'news';
        $latest_news_store->status   = $request->status;
        $latest_news_store->featured = 1;
        $latest_news_store->save();

        // Term Meta For excerpt
        $ln_term_excerpt          = new Termmeta();
        $ln_term_excerpt->term_id = $latest_news_store->id;
        $ln_term_excerpt->key     = 'excerpt';
        $ln_term_excerpt->value   = $request->excerpt;
        $ln_term_excerpt->save();

        // Term Meta For Image
        $ln_term_thuimage          = new Termmeta();
        $ln_term_thuimage->term_id = $latest_news_store->id;
        $ln_term_thuimage->key     = 'thum_image';
        $ln_term_thuimage->value   = $thum_image_path . $thum_image_name;
        $ln_term_thuimage->save();

        // Term Meta For Description
        $ln_term_description          = new Termmeta();
        $ln_term_description->term_id = $latest_news_store->id;
        $ln_term_description->key     = 'description';
        $ln_term_description->value   = $request->description;
        $ln_term_description->save();

        return response()->json('News Added Successfully');
    }

    // Latest News edit
    public function edit($id)
    {
        if (!Auth()->user()->can('news.edit')) {
            return abort(401);
        }
        $ln_edit = Term::findOrFail($id);
        return view('admin.latest_news.edit', compact('ln_edit'));
    }

    // Latest News update
    public function update(Request $request, $id)
    {
        // Validate
        $request->validate([
            'name'        => 'required',
            'excerpt'     => 'required',
            'description' => 'required',
            'thum_image'  => 'image|max:2024',
        ]);

        // Term Data Update
        $latest_news_update           = Term::findOrFail($id);
        $info_thuimg = $latest_news_update->thum_image->value;

        // Thum Image Check
        if ($request->hasFile('thum_image')) {
            unlink($info_thuimg);
            $thum_image      = $request->file('thum_image');
            $thum_image_name = hexdec(uniqid()) . '.' . $thum_image->getClientOriginalExtension();
            $thum_image_path = 'uploads/' . date('y/m/');
            $thum_image->move($thum_image_path, $thum_image_name);
            $img=$thum_image_path.$thum_image_name;
        }
        else{
            $img=$info_thuimg;
        }

        $latest_news_update->title    = $request->name;
        $latest_news_update->slug     = str::slug($request->name, '-');
        $latest_news_update->type     = 'news';
        $latest_news_update->status   = $request->status;
        $latest_news_update->featured = 1;
        $latest_news_update->save();

        // Term Meta For excerpt
        $ln_meta_excerpt_update          = Termmeta::where('term_id', $id)->where('key', 'excerpt')->first();
        $ln_meta_excerpt_update->value   = $request->excerpt;
        $ln_meta_excerpt_update->save();

        // Term Meta For Image
        $ln_meta_thumimg_update          = Termmeta::where('term_id', $id)->where('key', 'thum_image')->first();
        $ln_meta_thumimg_update->value   = $img;
        $ln_meta_thumimg_update->save();

        // Term Meta For Description
        $ln_meta_description_update          = Termmeta::where('term_id', $id)->where('key', 'description')->first();
        $ln_meta_description_update->value   = $request->description;
        $ln_meta_description_update->save();

        return response()->json('News Updated Successfully');
    }


    // Latest News Destory
    public function destroy($id)
    {
        if (!Auth()->user()->can('news.delete')) {
            return abort(401);
        }

        $ln_destory = Term::with('thum_image')->findOrFail($id);
        if(!empty($ln_destory->thum_image)){
            if(!empty($ln_destory->thum_image->value)){
                if(file_exists($ln_destory->thum_image->value)){
                    unlink($ln_destory->thum_image->value);
                }
            }
        }
        $ln_destory->delete();
        return redirect()->back()->with('success', 'Successfully Deleted'); 
    }
}
