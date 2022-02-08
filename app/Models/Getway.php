<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Getway extends Model
{
    use HasFactory;

    public function term()
    {
        return $this->belongsToMany(Term::class, 'termgetways', 'getway_id', 'term_id');
    }

}
