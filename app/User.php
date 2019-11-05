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

    


    public function getImageAttribute()
    {
       return $this->profile_image;
    }

    public function roles()
    {
      // return $this->belongsToMany(User::class);
      return $this->hasMany(User::class, 'users_id');
    }

    public function merchants()
    { 
      // return $this->belongsToMany(User::class);
      return $this->hasMany(Merchant::class);
    }

     public function packages()
    {
    return $this->belongsToMany(Package::class,'tag_owner_packages','users_id','packages_id')->withTimestamps();
    }



}
