<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    protected $primaryKey = 'merchants_id';

    protected $fillable = [
        'users_id', 'merchants_email', 'merchants_address', 'merchants_name', 'merchants_phone'
    ];

    public function users()
    {
      return $this->belongsTo(User::class, 'users_id');      
    }

    public function stores()
    {
        return $this->hasMany(Store::class , 'stores_id', 'merchants_id');
    }

}
