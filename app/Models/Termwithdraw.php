<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Termwithdraw extends Model
{
    use HasFactory;

    public function currency()
    {
        return $this->belongsTo(Term::class, 'term_id')->where('type', 'currency');
    }


}
