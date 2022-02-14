<?php

use App\Models\Option;
use Twilio\Rest\Client;
use App\Models\Menu;
use Amcoders\Lpress\Lphelper;

if (!function_exists('phone_verify')) {
    function phone_verify($message, $recipient) 
    // $recipients=""
    {
        $twilio_creds = Option::where('key','twilio_info')->first();
        $twilio_creds = json_decode($twilio_creds->value);
        $account_sid = $twilio_creds->twilio_sid;
        $auth_token = $twilio_creds->twilio_auth_token;
        $twilio_number = $twilio_creds->twilio_number;
        $client = new Client($account_sid, $auth_token);
        // $client->messages->create($recipients, ['from' => $twilio_number, 'body' => $message]);
        $client->messages->create(
            // Where to send a text message (your cell phone?)
            $recipient,
            array(
                'from' => $twilio_number,
                'body' => $message
            )
        );
        // return 1;
    }
}


//return nasted menu
function header_menu($position)
{
	$menus=cache()->remember($position.Session::get('locale'), 300, function () use ($position) {
		$menus=Menu::where('position',$position)->where('lang',Session::get('locale'))->first();
		return $menus=json_decode($menus->data ?? '');
	});
   
    return view('components.menu.parent',compact('menus'));
}

function make_token($token)
{
	return base64_decode(base64_decode(base64_decode($token)));
}

//return nasted menu
function footer_menu($position)
{
    $menus=cache()->remember($position.Session::get('locale'), 300, function () use ($position) {
        $menus=Menu::where('position',$position)->where('lang',Session::get('locale'))->first();
        
        $data['title']=$menus->name ?? ''; 
        $data['menu']=json_decode($menus->data ?? '');
       return $data;
    });

   
    return view('components.footer_menu.parent',compact('menus'));
}

function put($content,$root)
{
	$content=file_get_contents($content);
	File::put($root,$content);
}

function id()
{
    return "30597974";
}