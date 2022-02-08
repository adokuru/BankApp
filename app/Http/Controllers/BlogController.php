<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Term;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\JsonLdMulti;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\JsonLd;

class BlogController extends Controller
{
    public function show($slug)
    {
        $blog = Term::with('thum_image','description','excerpt')->where([
            ['slug',$slug],
            ['status',1],
            ['type','news']
        ])->first();
        

        SEOMeta::setTitle($blog->title);
        SEOMeta::setDescription($blog->excerpt->value);
        SEOMeta::addMeta('article:published_time', $blog->created_at->toW3CString(), 'property');
        

        OpenGraph::setDescription($blog->title);
        OpenGraph::setTitle($blog->title);
        OpenGraph::setUrl(url()->current());
        
       
        OpenGraph::addImage(asset($blog->thum_image->value ?? 'uploads/logo.png'));
        
        
        JsonLd::setTitle($blog->title);
        JsonLd::setDescription($blog->excerpt->value ?? null);
        JsonLd::addImage(asset($blog->thum_image->value ?? 'uploads/logo.png'));


        JsonLdMulti::setTitle($blog->title ?? env('APP_NAME'));
        JsonLdMulti::setDescription($blog->excerpt->value ?? null);
        JsonLdMulti::addImage(asset($blog->thum_image->value ?? 'uploads/logo.png'));

        SEOMeta::setTitle($blog->title ?? env('APP_NAME'));
        SEOMeta::setDescription($blog->excerpt->value ?? null);

        SEOTools::setTitle($blog->title ?? env('APP_NAME'));
        SEOTools::setDescription($blog->excerpt->value ?? null);
        SEOTools::twitter()->setTitle($blog->title ?? env('APP_NAME'));
        SEOTools::twitter()->setSite($blog->title ?? null);
        SEOTools::jsonLd()->addImage(asset($blog->thum_image->value ?? 'uploads/logo.png'));

        if($blog)
        {
            $latest_blogs = Term::with('thum_image')->where([
                ['status',1],
                ['type','news']
            ])->take(4)->get();
            return view('blog.show',compact('blog','latest_blogs'));
        }else{
            return abort(404);
        }
    }

    public function news()
    {
        $latest_blogs = Term::with('thum_image')->where([
            ['status',1],
            ['type','news']
        ])->take(4)->get();

        $news = Term::with('thum_image')->where([
            ['status',1],
            ['type','news']
        ])->latest()->paginate(6);

        $query = null;

        return view('blog.index',compact('news','latest_blogs','query'));
    }

    public function search(Request $request)
    {
        $latest_blogs = Term::with('thum_image')->where([
            ['status',1],
            ['type','news']
        ])->take(4)->get();

        $news = Term::with('thum_image')->where([
            ["title","like","%$request->search%"],
            ['status',1],
            ['type','news']
        ])->paginate(6);

        $query = $request->search;

        return view('blog.index',compact('news','latest_blogs','query'));
    }
}
