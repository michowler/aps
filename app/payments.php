<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payments extends Model
{
    
    protected $fillable = ['users_id','first_name','last_name','billing_address','city','country','postal_code','name_on_card','card_num','card_expiry','sec_code'];

    // // public function users(){
    // // 	return $this -> belongsTo('app\users');
    // }
}
