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
}
