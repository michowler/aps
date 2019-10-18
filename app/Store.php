<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
	protected $primaryKey = 'stores_id';

 	public function stores()
 	{
 	  return $this->belongsToMany(Store::class, 'stores_id');      
 	}
}
