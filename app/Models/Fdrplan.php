<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fdrplan extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'min_amount',
        'max_amount',
        'duration',
        'percent_return',
        'status',
    ];
}
