<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
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
        'name', 'email', 'password', 'profile_image', 'packages_id'
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
        'start_date' => 'datetime'
    ];

<<<<<<< HEAD
    


    public function getImageAttribute()
    {
       return $this->profile_image;
    }
=======
    //Alice
<<<<<<< HEAD
=======
>>>>>>> 4cdd23ef011a4929dcb2c7bf635b03c715e235a6

>>>>>>> f9bcae2f73bf02efd7e9e773756fc7be88f86594
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

<<<<<<< HEAD
     public function packages()
    {
    return $this->belongsToMany(Package::class,'tag_owner_packages','users_id','packages_id')->withTimestamps();
    }

=======
    public function vouchers()
    { 
      return $this->hasMany(Voucher::class);
    }

    //Ying Ying


>>>>>>> 4cdd23ef011a4929dcb2c7bf635b03c715e235a6


}
