<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Term;
use App\Models\User;
use App\Models\Withdrawmethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Newsletter;
use App\Models\Language;
use App\Models\Termwithdraw;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\JsonLdMulti;
use Artesaos\SEOTools\Facades\SEOMeta;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        try {
            DB::select('SHOW TABLES');
           
            //how it works section
            $howitworks = Term::with('howitworksMeta')->where([
                ['status', 1],
                ['type', 'howitworks'],
            ])->take(6)->get();

            //services section
            $services = Term::with('serviceMeta')->where([
                ['status', 1],
                ['type', 'services'],
            ])->get();

            //investors section
            $investors = Term::with('investor')->where([
                ['status', 1],
                ['type', 'investor'],
            ])->take(4)->get();

            //latest news section
            $latest_news = Term::with(['excerpt', 'description', 'thum_image'])->where([
                ['status', 1],
                ['type', 'news'],
            ])->take(3)->get();

            //latest news section
            $feedbacks = Term::with(['feedback'])->where([
                ['status', 1],
                ['type', 'feedback'],
            ])->get();

            $withdrawMethods = Withdrawmethod::where('status', 1)->get();

            $currency_list = Term::with('currencyMeta')->where('type', 'currency')->get();

            

            // All Title
            $titles=Option::where('key','titles')->first();
            $titles=json_decode($titles->value ?? '');
            // Counter
            $counter = Option::where('key', 'counter')->first();

            $seo=Option::where('key','seo')->first();
            $seo=json_decode($seo->value);
            JsonLdMulti::setTitle($seo->title ?? env('APP_NAME'));
            JsonLdMulti::setDescription($seo->description ?? null);
            JsonLdMulti::addImage(asset('uploads/logo.png'));

            SEOMeta::setTitle($seo->title ?? env('APP_NAME'));
            SEOMeta::setDescription($seo->description ?? null);
            SEOMeta::addKeyword($seo->tags ?? null);

            SEOTools::setTitle($seo->title ?? env('APP_NAME'));
            SEOTools::setDescription($seo->description ?? null);
            SEOTools::setCanonical($seo->canonical ?? url('/'));
            SEOTools::opengraph()->addProperty('keywords', $seo->tags ?? null);
            SEOTools::opengraph()->addProperty('image', asset('uploads/logo.png'));
            SEOTools::twitter()->setTitle($seo->title ?? env('APP_NAME'));
            SEOTools::twitter()->setSite($seo->twitterTitle ?? null);
            SEOTools::jsonLd()->addImage(asset('uploads/logo.png'));
            return view('index', compact('howitworks', 'services', 'investors', 'latest_news', 'feedbacks', 'counter','titles','withdrawMethods' , 'currency_list'));
            
        } catch (\Exception $e) {
            return redirect()->route('install');
        }

    }

    public function withdrawCheck(Request $request){
        $amount = $request->amount;
        $withdraw_method = Withdrawmethod::findOrFail($request->withdrawmethod);
        $currency = Term::findOrFail($request->currency);

        session([
            'withdraw_method_id' => $request->withdrawmethod,
            'term_id' => $request->currency,
            'amount_usd' => abs($request->amount),
            'charge_type' => $withdraw_method->charge_type,
            'fee' => $request->charge,
            'amount_withdraw' => abs($amount * (double) $currency->slug),
        ]);

        if (!Auth::check()) {
            return redirect()->route('login');
        }
        
        return redirect()->route('user.transfer.ecurrency.confirm');
    }

    //News letter subscription 
    public function subscribe(Request $request)
    {
        if ( ! Newsletter::isSubscribed($request->email) ) {
            Newsletter::subscribe($request->email);
        }else{
            return response()->json('Already Subscribed');
        }

        return response()->json('Subscribe Successful');
    }

    public function getCurrencyList(Request $request){
        $id = $request->id;
        $currency_list = Termwithdraw::with('currency')->where('withdrawmethod_id',$id)->get();

        foreach ($currency_list ?? [] as $item) {
            $logo = json_decode($item->currency->currencyMeta->value);
            $data[] = [
                'id' => $item->currency->id,
                'logo' => $logo->logo,
                'name' => $item->currency->title,
                'rate' => (float) $item->currency->slug
            ];
        }
       
        return json_encode($data);
    }

    public function lang($code)
    {
        $lang = Language::where('name',$code)->first();
        \Session::put('lang_position',$lang->position);
    	\Session::put('locale',$code);

        return back();
    }

}
