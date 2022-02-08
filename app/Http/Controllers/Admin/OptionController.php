<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function twilioEdit(){
        if (!Auth()->user()->can('option')) {
            return abort(401);
        }
        $twilio = Option::where('key','twilio_info')->first();
        return view('admin.option.twilio', compact('twilio'));
    }

    public function twilioUpdate($id, Request $request){
          $data = [
            'twilio_sid' => $request->twilio_sid,
            'twilio_auth_token' => $request->twilio_auth_token,
            'twilio_number' => $request->twilio_number,
            'message' => $request->message,
        ];
        $twilio = Option::findOrFail($id); 
        $twilio->value = json_encode($data);
        $twilio->save();
        return response()->json('Twilio Settings Updated!!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // if (!Auth()->user()->can('option.ownbank.edit')) {
        // return abort(401);
        // }
        // $option = Option::where('key','ownbank_charge')->get()->first();
        // return view('admin.option.ownbankedit', compact('option'));
    }

    public function ownbankEdit(){
        if (!Auth()->user()->can('option')) {
            return abort(401);
        }
        $ownbank = Option::where('key','ownbank_charge')->get()->first();
        return view('admin.option.ownbankedit', compact('ownbank'));
    }

    public function verificationSettingsEdit(){
        if (!Auth()->user()->can('option')) {
            return abort(401);
        }
        $verification_settings = Option::where('key','verification_settings')->get()->first();
        return view('admin.option.verification_settings', compact('verification_settings'));
    }

    public function verificationSettingsUpdate(Request $request, $id){
        // if (!Auth()->user()->can('option.ownbank.edit')) {
        //     return abort(401);
        // }
        // return $request->all();

        $data = [
            'phone_verification' => $request->phone_verification,
            'email_verification' => $request->email_verification,
        ];
        $verification_settings = Option::findOrFail($id); 
        $verification_settings->value = json_encode($data);
        $verification_settings->save();
        return response()->json('Verification Settings Updated!!');
    }

    public function billChargeEdit(){
        if (!Auth()->user()->can('option')) {
            return abort(401);
        }
        
        $billcharge = Option::where('key','bill_charge')->get()->first();
        return view('admin.option.billcharge_edit', compact('billcharge'));
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
        
    }

    public function billChargeUpdate(Request $request, $id){
        // if (!Auth()->user()->can('option.billcharge.edit')) {
        //     return abort(401);
        // }
        
        $request->validate([
            'charge_type'   => 'required'
        ]);

        $data = [
            'sender_charge' => $request->sender_charge,
            'receiver_charge' => $request->receiver_charge,
            'charge_type' => $request->charge_type,
        ];

        $billcharge = Option::findOrFail($id); 

        $billcharge->value = json_encode($data);

        $billcharge->save();

        return response()->json('Bill Charge Updated!!');
    }

    public function ownbankUpdate(Request $request, $id){
        // if (!Auth()->user()->can('otherbank.update')) {
        //     return abort(401);
        //  }
        $request->validate([
            'min_amount'     => 'required|min:1|lt:max_amount',
            'max_amount'     => 'required|gt:min_amount',
            'charge_type'   => 'required'
        ]);

        $data = [
            'min_amount' => $request->min_amount,
            'max_amount' => $request->max_amount,
            'charge_type' => $request->charge_type,
            'fixed_charge'     => ($request->charge_type == 'fixed' || $request->charge_type == 'both') ? ($request->fixed_charge ?? 0) : 0,
            'percent_charge' => ($request->charge_type == 'percentage' || $request->charge_type == 'both') ? ($request->percent_charge ?? 0) : 0
        ];

        $ownbank = Option::findOrFail($id); 

        $ownbank->value = json_encode($data);

        $ownbank->save();

        return response()->json('Own Bank Charge Updated!!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // Option Hero Section
    public function heroSection()
    {
        if (!Auth()->user()->can('option')) {
            return abort(401);
        }
        $hero_data = Option::where('key', 'hero_section')->first();
        return view('admin.option.hero_section', compact('hero_data'));
    }

    // Option Hero Section Update
    public function heroSectionUpdate(Request $request, $id)
    {
        $data = [
            'title'             => $request->title,
            'short_description' => $request->short_description,
            'button_text'       => $request->button_text,
            'button_url'        => $request->button_url,
            'status'            => $request->status
        ];

        $hero_section        = Option::findOrFail($id);
        $hero_section->value = json_encode($data);
        $hero_section->save();

        return response()->json('Hero Section Updated!!');
    }


    public function settingsEdit(){
        $theme = Option::where('key', 'theme_settings')->first();
        
        return view('admin.option.theme', compact('theme'));
    }


    public function settingsUpdate($id, Request $request){
        foreach ($request->social as $value) {
            $social[] = [
                'icon' => $value['icon'],
                'link' => $value['link']
            ];
        };

        // logo check
        if ($request->hasFile('logo')) {
            $logo      = $request->file('logo');
            $logo_name = 'logo.png';
            $logo_path = 'uploads/';
            $logo->move($logo_path, $logo_name);
            
        }

        if ($request->hasFile('favicon')) {
            $favicon      = $request->file('favicon');
            $favicon_name = 'favicon.ico';
            $favicon_path = 'uploads/';
            $favicon->move($favicon_path, $favicon_name);
        }

        $data = [
            'footer_description' => $request->footer_description,
            'newsletter_address' => $request->newsletter_address,
            'social'      => $social,
        ];

      $theme = Option::findOrFail($id); 
      $theme->key = 'theme_settings';
      $theme->value = json_encode($data);
      $theme->save();
      return response()->json('Theme Settings Updated!!');
  }
}
