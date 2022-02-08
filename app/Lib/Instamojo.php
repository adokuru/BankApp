<?php
namespace App\Lib;
use Session;
use Illuminate\Http\Request;
use Http;
class Instamojo {
        
    public static function redirect_if_payment_success()
    {
        return url('user/payment/success');
    }

    public static function redirect_if_payment_faild()
    {
       return url('user/payment/fail');  
    }

    public static function fallback()
    {
       return url('/payment/instamojo'); 
    }

    public static function make_payment($array)
    {
        $currency=$array['currency'];
        $email=$array['email'];
        $amount=$array['pay_amount'];
        $name=$array['name'];
        $billName=$array['billName'];
      	

        $data['x_auth_token']=$array['x_auth_token'];
        $data['x_api_key']=$array['x_api_key'];
        $data['payment_mode']='instamojo';
        $data['amount']=$amount;
        $data['charge']=$array['charge'];
        $data['phone']=$array['phone'];
        $data['getway_id']=$array['getway_id'];
        $data['main_amount']=$array['amount'];
        $data['payment_type']=$array['payment_type'];
        $data['billName']=$billName;
        $data['name']=$name;
        $data['email']=$email;
        $data['currency']=$currency;
        if(env('APP_DEBUG') == false){
            $data['env']=false;
            $test_mode=false;
        }
        else{
            $data['env']=true;
            $test_mode=true;
        }
        Session::put('instamojo_credentials',$data);


        if ($test_mode == true) {
            $url='https://test.instamojo.com/api/1.1/payment-requests/';
        }
        else{
            $url='https://www.instamojo.com/api/1.1/payment-requests/';
        }     

        try {
            $params=[
                'purpose' => $data['billName'],
                'amount' => $amount,
                'phone' => $data['phone'],
                'buyer_name' => $name,
                'redirect_url' => Instamojo::fallback(),
                'send_email' => true,
                'send_sms' => true,
                'email' => $email,
                'allow_repeated_payments' => false
            ];
         $response=Http::asForm()->withHeaders([
                'X-Api-Key' => $data['x_api_key'],
                'X-Auth-Token' => $data['x_auth_token']
            ])->post($url,$params);

        if(isset($response['payment_request'])) {
            $url= $response['payment_request']['longurl'];
            return redirect($url);
        }
       else{
            Session::forget('instamojo_credentials');
            return redirect(Instamojo::redirect_if_payment_faild());
        }
        } catch (\Throwable $th) {
            Session::forget('instamojo_credentials');
            return redirect(Instamojo::redirect_if_payment_faild());
        }
       
        
    }


    public function status()
    {
        if(!Session::has('instamojo_credentials')){
            return abort(404);
        }
        $response=Request()->all();
        $payment_id=$response['payment_id'];
        $info=Session::get('instamojo_credentials');
        if ($response['payment_status']=='Credit') {
             $data['payment_id'] = $payment_id;           
             $data['payment_method'] = "instamojo";
             $data['getway_id'] = $info['getway_id'];
             $data['payment_type'] = $info['payment_type'];
             $data['amount'] = $info['main_amount'];
             $data['charge'] = $info['charge'];
             $data['status'] = 1;  
           
             Session::forget('instamojo_credentials');
             Session::put('payment_info',$data); 
             
             return redirect(Instamojo::redirect_if_payment_success());
        }      
        else{
           
            Session::forget('instamojo_credentials');
            return redirect(Instamojo::redirect_if_payment_faild());
        }
    }

}


?>