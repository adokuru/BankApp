<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;



class DashboardController extends Controller
{
    /**
     * Display Homepage.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('home');
    }


    public function about()
    {

        return view('about');
    }
    public function host()
    {

        return view('host');
    }
    public function contact()
    {

        return view('contact');
    }


    public function gettingstarted()
    {

        return view('getting-started');
    }

    public function register()
    {

        return view('register');
    }

    public function termsofservice()
    {

        return view('terms-of-service');
    }

    public function helpcenter()
    {

        return view('help-center');
    }

    public function features()
    {

        return view('features');
    }
    public function faq()
    {

        return view('faq');
    }
}