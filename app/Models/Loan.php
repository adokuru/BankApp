<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    // Relation To user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // Relation To Loan Plans
    public function loanplan()
    {
        return $this->belongsTo(Loanplan::class, 'loanplan_id', 'id');
    }
}
