<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdrawmethod extends Model
{
    use HasFactory;
    // public $timestamps = false;

    public function term()
    {
        return $this->belongsToMany(Term::class, 'termwithdraws', 'withdrawmethod_id', 'term_id');
    }
}
