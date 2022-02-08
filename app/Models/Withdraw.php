<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function withdrawmethod(){
        return $this->belongsTo(Withdrawmethod::class);
    }

    public function term(){
        return $this->belongsTo(Term::class)->where('type', 'currency');
    }
}
