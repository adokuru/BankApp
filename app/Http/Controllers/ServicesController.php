<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Term;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\JsonLdMulti;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\JsonLd;
class ServicesController extends Controller
{
    public function show($slug)
    {
        $service = Term::with('serviceMeta')->where([
            ['slug',$slug],
            ['status',1],
            ['type','services']
        ])->first();
        if(empty($service)){
            abort(404);
        }
        $meta=json_decode($service->serviceMeta->value ?? '');
        
        SEOMeta::setTitle($service->title);
        SEOMeta::setDescription($meta->short_description ?? '');
        SEOMeta::addMeta('article:published_time', $service->created_at->toW3CString(), 'property');
        

        OpenGraph::setDescription($meta->short_description ?? '');
        OpenGraph::setTitle($service->title);
        OpenGraph::setUrl(url()->current());
        
       
        OpenGraph::addImage(asset($meta->image ?? 'uploads/logo.png'));
        
        
        JsonLd::setTitle($service->title);
        JsonLd::setDescription($meta->short_description ?? '');
        JsonLd::addImage(asset($meta->image  ?? 'uploads/logo.png'));


        JsonLdMulti::setTitle($service->title ?? env('APP_NAME'));
        JsonLdMulti::setDescription($meta->short_description ?? '');
        JsonLdMulti::addImage(asset($meta->image ?? 'uploads/logo.png'));

        SEOMeta::setTitle($service->title ?? env('APP_NAME'));
        SEOMeta::setDescription($meta->short_description ?? '');

        SEOTools::setTitle($service->title ?? env('APP_NAME'));
        SEOTools::setDescription($meta->short_description ?? '');
        SEOTools::twitter()->setTitle($service->title ?? env('APP_NAME'));
        SEOTools::twitter()->setSite($service->title ?? null);
        SEOTools::jsonLd()->addImage(asset($meta->image ?? 'uploads/logo.png'));

        return view('service.show',compact('service'));
    }

    public function index()
    {
        $services = Term::with('serviceMeta')->where([
            ['status',1],
            ['type','services']
        ])->latest()->get();

        return view('service.index',compact('services'));
    }
}
