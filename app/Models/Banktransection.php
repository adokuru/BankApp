<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banktransection extends Model
{
    use HasFactory;
    
    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id')->where('type', 'otherbank_transfer');
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id','id');
    }

    public function term()
    {
        return $this->belongsTo(Term::class, 'term_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
    
}
