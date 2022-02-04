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


    public function FAQ()
    {

        return view('FAQ');
    }
}