<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IntVou extends Model
{
    protected $table = 'tag_interests_vouchers';
    protected $primaryKey = 'interests_vouchers_id';
    
    public $incrementing = true;

	public function vouchers()
	{
	    return $this->belongsTo(Voucher::class, 'tag_interests_vouchers', 'interests_id', 'vouchers_id' );
	}

    public function interests()
    {
        return $this->belongsTo(Interest::class);
    }

}
