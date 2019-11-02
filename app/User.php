<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $primaryKey = 'users_id';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'profile_image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Alice

    public function roles()
    {
      return $this->hasMany(User::class, 'users_id');
    }

    //Michelle
    public function getImageAttribute()
    {
       return $this->profile_image;
    }

    public function merchants()
    { 
      return $this->hasMany(Merchant::class);
    }

    public function vouchers()
    { 
      return $this->hasMany(Voucher::class);
    }

    //Ying Ying




}
