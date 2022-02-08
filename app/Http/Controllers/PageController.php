<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Term;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\JsonLdMulti;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\JsonLd;
class PageController extends Controller
{
    public function show($slug)
    {
        $page = Term::with('page')->where([
            ['status',1],
            ['type','page'],
            ['slug',$slug]
        ])->first();

        if (empty($page)) {
        	 abort(404);
        }

        $info=json_decode($page->page->value ?? '');

        SEOMeta::setTitle($page->title);
        SEOMeta::setDescription($info->page_excerpt);
        SEOMeta::addMeta('article:published_time', $page->created_at->toW3CString(), 'property');
        

        OpenGraph::setDescription($page->title);
        OpenGraph::setTitle($page->title);
        OpenGraph::setUrl(url()->current());
        
       
        OpenGraph::addImage(asset('uploads/logo.png'));
        
        
        JsonLd::setTitle($page->title);
        JsonLd::setDescription($info->page_excerpt ?? null);
        JsonLd::addImage(asset('uploads/logo.png'));


        JsonLdMulti::setTitle($page->title ?? env('APP_NAME'));
        JsonLdMulti::setDescription($info->page_excerpt ?? null);
        JsonLdMulti::addImage(asset('uploads/logo.png'));

        SEOMeta::setTitle($page->title ?? env('APP_NAME'));
        SEOMeta::setDescription($info->page_excerpt ?? null);

        SEOTools::setTitle($page->title ?? env('APP_NAME'));
        SEOTools::setDescription($info->page_excerpt ?? null);
        SEOTools::twitter()->setTitle($page->title ?? env('APP_NAME'));
        SEOTools::twitter()->setSite($page->title ?? null);
        SEOTools::jsonLd()->addImage(asset('uploads/logo.png'));

        return view('page.show',compact('page'));
    }
}
