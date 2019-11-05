<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
	protected $primaryKey = 'stores_id';

	public function merchant()
	{
	    return $this->belongsTo(Merchant::class, 'merchants_id', 'stores_id');
	}

 	public function vouchers()
 	{
 	  return $this->belongsToMany(Voucher::class, 'tag_stores_vouchers', 'stores_id', 'vouchers_id' )->withTimestamps();
 	}

}
