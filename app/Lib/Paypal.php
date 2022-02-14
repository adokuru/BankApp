<?php
namespace App\Lib;
use Omnipay\Omnipay;
use Session;
use Illuminate\Http\Request;
class Paypal {
        
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
       return url('/payment/paypal'); 
    }

    public static function make_payment($array)
    {
        $client_id=$array['client_id'];
        $client_secret=$array['client_secret'];
        $currency=$array['currency'];
        $email=$array['email'];
        $amount=round($array['pay_amount']);
        $name=$array['name'];
        $billName=$array['billName'];
        

        $data['client_id']=$client_id;
        $data['client_secret']=$client_secret;
        $data['payment_mode']='paypal';
        $data['amount']=$amount;
        $data['charge']=$array['charge'];
        $data['main_amount']=$array['amount'];
        $data['getway_id']=$array['getway_id'];
        $data['payment_type']=$array['payment_type'];
     

        if(env('APP_DEBUG') == false){
            $data['env']=false;
            $test_mode=false;
        }
        else{
            $data['env']=true;
            $test_mode=true;
        }

        if (env('APP_DEBUG') == true) {
            $total_amount=$amount/100;
        }
        else{
             $total_amount=$amount;
        }

       

        Session::put('paypal_credentials',$data);
        $gateway = Omnipay::create('PayPal_Rest');
        $gateway->setClientId($client_id);
        $gateway->setSecret($client_secret);
        $gateway->setTestMode($test_mode); 

        $response = $gateway->purchase(array(
            'amount' => round($total_amount),
            'currency' => strtoupper($currency),
            'returnUrl' => Paypal::fallback(),
            'cancelUrl' => Paypal::redirect_if_payment_faild(),
        ))->send();
        if ($response->isRedirect()) {
            $response->redirect(); // this will automatically forward the customer
        } else {
            // not successful
           
            return redirect(Paypal::redirect_if_payment_faild());
        }


    }

    public function status(Request $request)
    {
        if(!Session::has('paypal_credentials')){
            return abort(404);
        }

        $credentials=Session::get('paypal_credentials');

        $gateway = Omnipay::create('PayPal_Rest');
        $gateway->setClientId($credentials['client_id']);
        $gateway->setSecret($credentials['client_secret']);
        $gateway->setTestMode($credentials['env']); 

        $request= $request->all();

        $transaction = $gateway->completePurchase(array(
            'payer_id'             => $request['PayerID'],
            'transactionReference' => $request['paymentId'],
        ));
        $response = $transaction->send();
        if ($response->isSuccessful()) {
            $arr_body = $response->getData();
            $data['payment_id'] = $arr_body['id'];
            $data['payment_method'] = "paypal";
            $data['getway_id'] = $credentials['getway_id'];
            $data['payment_type'] = $credentials['payment_type'];
            $data['amount'] = $credentials['main_amount'];
            $data['charge'] = $credentials['charge'];
            $data['status'] = 1;            
            Session::put('payment_info',$data);
            Session::forget('paypal_credentials');
            return redirect(Paypal::redirect_if_payment_success());
        }
        else{
           Session::forget('paypal_credentials');
           return redirect(Paypal::redirect_if_payment_faild());
        }
    }


}


?>