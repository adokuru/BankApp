<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $user = User::create([
            'name' => 'John Doe',
            'username' => 'johndoe',
            'email' => 'johndoe@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        Account::create([
            'user_id' => $user->id,
            'account_number' => '123456789',
            'account_type' => 'savings',
            'balance' => '0',
            'currency' => 'USD',
            'bank_identifier' => '00962',
            'IBAN_Check_digits' => '88',
            'iso' => 'CH',
            'IBAN' => 'CH8800962123456789',
        ]);
    }
}
