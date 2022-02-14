<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    // Relation to Term
    public function country()
    {
        return $this->belongsTo(Term::class, 'term_id')->where('type', 'country');
    }
}
