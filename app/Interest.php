<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    protected $primaryKey = 'interests_id';

    public function vouchers()
    {
        return $this->belongsToMany('Voucher');
    }
}
