<?php
namespace App\Lib;
use Session;
use Illuminate\Http\Request;
use Http;
use Str;
class Paystack {
        
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
       return url('/payment/Paystack'); 
    }

    public function view(){
     
        if(Session::has('paystack_credentials')){
           
           
            $Info=Session::get('paystack_credentials');
            $amount=$Info['amount'];
            $public_key=$Info['public_key'];
           
            return view('user.edeposit.payment.paystack',compact('Info','amount','public_key'));
        }
        abort(404);
    }

    public static function make_payment($array)
    {
        $currency=$array['currency'];
        $email=$array['email'];
        $amount=$array['pay_amount'];
        $name=$array['name'];
        $billName=$array['billName'];
      	

        $data['public_key']=$array['public_key'];
        $data['secret_key']=$array['secret_key'];
        $data['payment_mode']='toyyibpay';
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
       
        Session::put('paystack_credentials',$data);
        return redirect('/user/paystack/payment');

        
       
        
    }


    public function status(Request $request)
    {
        if(!Session::has('paystack_credentials')){
            return abort(404);
        }
       
        
        $info=Session::get('paystack_credentials');
        $curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.paystack.co/transaction/verify/".$request->ref_id,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"Authorization: Bearer ".$info['secret_key']."",
				"Cache-Control: no-cache",
			),
		));

        $response = curl_exec($curl);
        
		$err = curl_error($curl);
        curl_close($curl);
        
		if ($err) {
             Session::forget('paystack_credentials');
			 return redirect(Paystack::redirect_if_payment_faild());
		} else {
			$data=json_decode($response);
			
			if($data->status == true && $data->data->status == 'success'){
				$ref_id=$data->data->reference;
				$amount=$data->data->amount/100;
				if($amount != $info['amount']){
                    return abort(404);
                }
               
				$pay_data['payment_id'] = $ref_id;
				$pay_data['payment_method'] = "paystack";
                $pay_data['getway_id'] = $info['getway_id'];
                $pay_data['payment_type'] = $info['payment_type'];
                $pay_data['amount'] = $info['main_amount'];
                $pay_data['charge'] = $info['charge'];
                $pay_data['status'] = 1;  
              
                Session::forget('paystack_credentials');
                Session::put('payment_info',$pay_data); 

				return redirect(Paystack::redirect_if_payment_success());
			}
		}
        Session::forget('paystack_credentials');
        return redirect(Paystack::redirect_if_payment_faild());


        
    }

}


?>