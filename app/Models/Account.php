<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = ['balance'];

    const IBAN_Check_digits = '88';
    const bank_identifier = '00962';
    const iso = 'CH';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
