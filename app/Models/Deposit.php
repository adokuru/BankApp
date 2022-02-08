<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;

    // Relation To User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // Relation To Getway
    public function getway()
    {
        return $this->belongsTo(Getway::class, 'getway_id');
    }

    // Relation To Getway
    public function meta()
    {
        return $this->hasOne(Depositmeta::class, 'deposit_id')->where('key', 'deposit_info');
    }

}
