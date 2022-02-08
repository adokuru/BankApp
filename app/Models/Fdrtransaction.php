<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fdrtransaction extends Model
{
    use HasFactory;

    // Relation To user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // Relation To Loan Plans
    public function fdrplan()
    {
        return $this->belongsTo(Fdrplan::class, 'fdrplan_id', 'id');
    }
}
