<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Option;
use Illuminate\Http\Request;

class TitleManagmentController extends Controller
{
    // How it work Title
    public function title_view()
    {
        if (!Auth()->user()->can('title')) {
            return abort(401);
         }
        $howit_work_title = Option::where('key', 'titles')->first();
        $data=json_decode($howit_work_title->value ?? '');
        return view('admin.titlemanagment.titles', compact('data'));
    }

   

    // Last News Update
    public function title_update(Request $request)
    {
        
        $titles        = Option::where('key','titles')->first();
        if(empty($titles)){
           $titles=new Option;
           $titles->key = 'titles';
        }
        $data = [
            'client_title'     => $request->client_title,
            'client_description' => $request->client_description,
            'hwt_title' => $request->hwt_title,
            'hwt_description' => $request->hwt_description,
            'tit_title' => $request->tit_title,
            'tit_description' => $request->tit_description,
            'lnt_title' => $request->lnt_title,
            'lnt_description' => $request->lnt_description,
            'bst_title' => $request->bst_title,
            'bst_description' => $request->bst_description,
            'hero_title' => $request->hero_title,
            'hero_description' => $request->hero_description,
            'hero_btn_title' => $request->hero_btn_title,
            'hero_button_url' => $request->hero_button_url,
            
        ];



        $titles->value = json_encode($data);
        $titles->save();

        return response()->json('Title updated');
    }
}
