<?php

namespace App\Actions\Fortify;

use App\Models\Account;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        $user =  User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
        $rand = rand(10000000000, 99999999999);
        Account::create([
            'user_id' => $user->id,
            'balance' => 0,
            'account_number' => $rand,
            'bank_identifier' => '00962',
            'IBAN_Check_digits' => '88',
            'iso' => 'CH',
            'IBAN' => 'CH'.Account::IBAN_Check_digits.' '.'00962'.' '.$rand,
        ]);

        return $user;
    }
}
