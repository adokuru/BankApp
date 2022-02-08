<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;
use App\Models\User;
use Auth;
use samdark\sitemap\Sitemap;
use samdark\sitemap\Index;
class SeoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (!Auth()->user()->can('seo.settings')) {
            abort(401);
        }
       $settings=Option::where('key','seo')->first();
       $info=json_decode($settings->value);

       return view('admin.seo.index',compact('info'));
    }

 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $seo['title']=$request->title;
        $seo['description']=$request->description;
        $seo['canonical']=$request->canonical;
        $seo['tags']=$request->tags;
        $seo['twitterTitle']=$request->twitterTitle;

        $json=json_encode($seo);

        $settings=Option::where('key','seo')->first();

        $settings->value=$json;
        $settings->save();
        return response()->json('Site Seo Updated');
        
    }

    public function update(Request $request,$id)
    {

        $index = new Index(base_path('sitemap.xml'));
        $index->addSitemap(url('/'));
        
        $getfunctions=GetThemeRoot().'/functions.php';
        if (file_exists($getfunctions)) {
            include_once($getfunctions);
            if (function_exists('RegisterSitemap')) {
               $data=RegisterSitemap();

               if (isset($data['dynamic'])) {
                   foreach ($data['dynamic'] as $key => $value) {
                    $url=$value['url'];

                    $terms=$value['model']::where('type',$value['type'])->select('slug')->latest()->get();
                    foreach ($terms as $key => $value) {
                         $index->addSitemap($url.$value->slug);
                       }
                     }
                   }
                   if(isset($data['static'])){
                     foreach ($data['static'] as $key => $value) {
                      $index->addSitemap($value['url']);
                    }  
                  }

                 
               }
             }
       
        
       
       $check= $index->write();
      
        return response()->json('New Sitemap Generated');
    }

   
}
