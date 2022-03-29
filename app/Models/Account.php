<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $guarded = [];

    const IBAN_Check_digits = '88';
    const bank_identifier = '00962';
    const iso = 'CH';



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function deposit()
    {
        return $this->hasMany(Deposit::class, 'account_id', 'id');
    }
    public function debit()
    {
        return $this->hasMany(Debits::class, 'account_id', 'id');
    }

    public function totaldeposit()
    {
        return $this->hasMany(Deposit::class, 'account_id', 'id')->sum('amount');
    }
    public function totaldebits()
    {
        return $this->hasMany(Debits::class, 'account_id', 'id')->sum('amount');
    }

}
