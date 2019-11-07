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
        'name', 'email', 'password', 'country', 'birth_date', 'occupation', 'profile_image', 'packages_id', 'marital_status', 'working_level', 'gender', 'age', 'education_level', 'address'
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

    //Alice

    public function roles()
    {
      return $this->belongsToMany(Role::class, 'tag_users_roles','users_id','roles_id')->withTimestamps();
    }

    //Michelle
    public function hasRole($role = null) {
        $hasRole = false;
        $hasRole = !$this->roles->filter(function($item) use ($role) {
            return $item->name == $role;
        })->isEmpty();
        return $hasRole;
    }

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

    public function packages()
    {
    return $this->belongsToMany(Package::class,'tag_owner_packages','users_id','packages_id')->withTimestamps();
    }




}
