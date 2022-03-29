<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'first_name',
        'last_name',
        'address',
        'phone',
        'country',
        'city',
        'postal_code',
        'username',
        'role',
        'image',
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',

    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'phone_verified_at' => 'datetime',

    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
    // Relation to transactions Model
    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'user_id', 'id');
    }


    public function deposit()
    {
        return $this->hasMany(Deposit::class, 'user_id', 'id');
    }

    public function totaldeposit()
    {
        return $this->hasMany(Deposit::class, 'user_id', 'id')->sum('amount');
    }
    public function totalcredits()
    {
        return $this->hasMany(Debits::class, 'user_id', 'id')->sum('amount');
    }

    public function account()
    {
        return $this->hasOne(Account::class);
    }

    public function getProfilePhotoUrlAttribute()
    {
        return 'https://ui-avatars.com/api/?name=' . $this->first_name . '+' . $this->last_name . '&background=0D8ABC&color=fff&size=128';
    }

    public function getBalanceAttribute()
    {
        return $this->account->balance;
    }

    public function getAccountNumberAttribute()
    {
        return $this->account->account_number;
    }

    public function getAccountNameAttribute()
    {
        return $this->account->account_name;
    }

    public function getAccountTypeAttribute()
    {
        return $this->account->account_type;
    }

    public function getCurrencyAttribute()
    {
        return $this->account->currency;
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }
}
