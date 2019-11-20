<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    protected $primaryKey = 'users_id';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name', 'email', 'password', 'country', 'birth_date', 'occupation', 'profile_image', 'packages_id', 'marital_status', 'working_level', 'gender', 'age', 'education_level', 'address'
    // ];
    protected $fillable = [
        'name', 'email', 'password', 'packages_id', 'marital_status', 'working_level', 'gender', 'age', 'education_level'
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
    public function surveys()
    {
      return $this->belongsToMany(User::class,'tag_respondents_surveys','users_id','surveys_id')->withTimestamps()->withPivot('voucher_redeem_status', 'voucher_redemption_date');
    }

    public function roles()
    {
      return $this->belongsToMany(Role::class, 'tag_users_roles','users_id','roles_id')->withTimestamps();
    }

    public function authorizeRoles($roles)
    {
        if (is_array($roles)){
            return $this -> hasAnyRole($roles) || abort(401,'This action is unauthorized.');
        }

        return $this -> hasRole($roles) || abort (401,'This action is unauthorized.');
    }

    public function hasAnyRole($roles)
    {
        return null !==$this->roles() -> whereIn('title',$roles)->first();
    }

    public function options()
    {
        return $this->hasMany('tag_respondents_options','options_id');
    }

    // public function hasRole($roles)
    // {
    //     return null !== $this->roles() ->where('title',$roles)->first();
    // }

    //Michelle
    public function hasRole($role = null) {
        $hasRole = false;
        $hasRole = !$this->roles->filter(function($item) use ($role) {
            return $item->title == $role;
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
