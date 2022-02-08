<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Getway;
use Illuminate\Support\Str;

class AutoPaymentGetwaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Getway::create([
            'name' => 'paypal',
            'rate' => 10,
            'deposit_min' => 100,
            'deposit_max' => 1000,
            'charge_type' => 'fixed',
            'fix_charge'  => 50,
            'percent_charge' => 0,
            'data'  => json_encode([
                'client_id' => '',
                'client_secret' => ''
            ]),
        ]);
        
        Getway::create([
            'name' => 'stripe',
            'rate' => 10,
            'deposit_min' => 100,
            'deposit_max' => 1000,
            'charge_type' => 'fixed',
            'fix_charge'  => 50,
            'percent_charge' => 0,
            'data'  => json_encode([
                'publishable_key' => '',
                'secret_key' => ''
            ]),
        ]);
        
        Getway::create([
            'name' => 'razorpay',
            'rate' =>10,
            'deposit_min' => 100,
            'deposit_max' => 1000,
            'charge_type' => 'fixed',
            'fix_charge'  => 50,
            'percent_charge' => 0,
            'data'  => json_encode([
                'key_id' => '',
                'key_secret' => ''
            ]),
        ]);
        
        Getway::create([
            'name' => 'instamojo',
            'rate' => 10, //inr
            'deposit_min' => 100,
            'deposit_max' => 1000,
            'charge_type' => 'fixed',
            'fix_charge'  => 50,
            'percent_charge' => 0,
            'data'  => json_encode([
                'x_api_key' => '',
                'x_auth_token' => '',
                'rate' => 'inr'
            ]),
        ]);
        
        Getway::create([
            'name' => 'toyyibpay',
            'rate' => 10, 
            'deposit_min' => 100,
            'deposit_max' => 1000,
            'charge_type' => 'fixed',
            'fix_charge'  => 50,
            'percent_charge' => 0,
            'data'  => json_encode([
                'user_secret_key' => '',
                'cateogry_code' => '',
                'rate' => 'mr'
            ]),
        ]);
        
        Getway::create([
            'name' => 'mollie',
            'rate' => 10, 
            'deposit_min' => 100,
            'deposit_max' => 1000,
            'charge_type' => 'fixed',
            'fix_charge'  => 50,
            'percent_charge' => 0,
            'data'  => json_encode([
                'api_key' => ''
            ]),
        ]);
        
       
        Getway::create([
            'name' => 'paystack',
            'rate' => 10, 
            'deposit_min' => 100,
            'deposit_max' => 1000,
            'charge_type' => 'fixed',
            'fix_charge'  => 50,
            'percent_charge' => 0,
            'data'  => json_encode([
                'public_key' => '',
                'secret_key' => '',
                'ngn_rate' => 10
            ]),
        ]);

       
    }
}
