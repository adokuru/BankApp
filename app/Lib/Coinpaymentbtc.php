<?php
namespace App\Lib;
use Session;
use Illuminate\Http\Request;
use Http;
use App\Lib\CoinPaymentsAPI;
class Coinpaymentbtc {
        
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
       return url('/payment/coinpaymentbtn'); 
    }

    public static function make_payment($array)
    {
        $currency=$array['currency'];
        $email=$array['email'];
        $amount=$array['pay_amount'];
        $name=$array['name'];
        $billName=$array['billName'];
      	

        $data['public_key']=$array['public_key'];
        $data['private_key']=$array['private_key'];
        $data['payment_mode']='coinpayment';
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
        Session::put('coinpayment_credentials',$data);

        $coin= new CoinPaymentsAPI();
        $coin->Setup($array['private_key'],$array['public_key']);

        $req=[
            'amount'=> 1,
            'currency1'=> 'USD',
            'currency2'=> 'LTCT',
            'buyer_email'=> $email,
            'item'=> $billName,
            'address'=>'',
            'ipn_url'=>Coinpaymentbtc::fallback(),
        ];

        dd($coin->CreateTransaction($req));

        
        
       
        
    }


    public function status()
    {
        if(!Session::has('coinpayment_credentials')){
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