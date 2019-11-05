<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $primaryKey = 'roles_id';

    //
    public function users()
    {
      return $this->belongsToMany(User::class, 'tag_users_roles','roles_id','users_id')->withTimestamps();
      
    }

}
