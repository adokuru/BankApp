<?php
namespace App\Lib;
use Session;
use Illuminate\Http\Request;
use Http;
use Str;
class Toyyibpay {
        
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
       return url('/payment/toyyibpay'); 
    }

    public static function make_payment($array)
    {
        $currency=$array['currency'];
        $email=$array['email'];
        $amount=$array['pay_amount'];
        $name=$array['name'];
        $billName=$array['billName'];
      	

        $data['user_secret_key']=$array['user_secret_key'];
        $data['cateogry_code']=$array['cateogry_code'];
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
        Session::put('toyyibpay_credentials',$data);


        if ($test_mode == false) {
			$url='https://toyyibpay.com/';
		}
		else{
			$url='https://dev.toyyibpay.com/';
		}

		
		$data = array(
			'userSecretKey'=>$array['user_secret_key'],
			'categoryCode'=>$array['cateogry_code'],
			'billName'=>$billName,
			'billDescription'=>"Thank you for deposite",
			'billPriceSetting'=>1,
			'billPayorInfo'=>1,
			'billAmount'=>$amount*100,
			'billReturnUrl'=>Toyyibpay::fallback(),
			'billCallbackUrl'=>Toyyibpay::fallback(),
			'billExternalReferenceNo' => Str::random(5),
			'billTo'=>$name,
			'billEmail'=>$email,
			'billPhone'=>$array['phone'],
			'billSplitPayment'=>0,
			'billSplitPaymentArgs'=>'',
			'billPaymentChannel'=>'2',
			'billDisplayMerchant'=>1,
			'billContentEmail'=>"",
			'billChargeToCustomer'=>2
		);  
		$f_url= $url.'index.php/api/createBill';
		
		$response= Http::asForm()->post($f_url,$data);
		$billcode=$response[0]['BillCode'];
		$url=$url.$billcode;
		return redirect($url);
       
        
    }


    public function status()
    {
        if(!Session::has('toyyibpay_credentials')){
            return abort(404);
        }
        $response=Request()->all();
		$status=$response['status_id'];
		$payment_id=$response['billcode'];
        
        $info=Session::get('toyyibpay_credentials');
        if ($status==1) {
             $data['payment_id'] = $payment_id;           
             $data['payment_method'] = "toyyibpay";
             $data['getway_id'] = $info['getway_id'];
             $data['payment_type'] = $info['payment_type'];
             $data['amount'] = $info['main_amount'];
             $data['charge'] = $info['charge'];
             $data['status'] = 1;  
           
             Session::forget('toyyibpay_credentials');
             Session::put('payment_info',$data); 
             
             return redirect(Toyyibpay::redirect_if_payment_success());
        }      
        else{
           
            Session::forget('toyyibpay_credentials');
            return redirect(Toyyibpay::redirect_if_payment_faild());
        }
    }

}


?>