<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    protected $primaryKey = 'interests_id';
    public $incrementing = true;

    public function vouchers()
    {
        return $this->belongsToMany(Voucher::class, 'tag_interests_vouchers', 'interests_id', 'vouchers_id' )->withTimestamps();
    }
    
    //Alice
    public function surveys()
    {
    	return $this -> belongsToMany(Interest::class,'tag_intrerest_surveys','interests_id','surveys_id');
    }

    public function users()
    {
      return $this->belongsTo(User::class, 'users_id');      
    }
}
