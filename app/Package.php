<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    //
    protected $primaryKey = 'packages_id';

     public function users()
    {
  	return $this->belongsToMany(User::class,'tag_owner_packages','packages_id','users_id')->withTimestamps();
    }
}
