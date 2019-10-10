<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    //
    public function users()
    {
      return $this->belongsToMany(Merchant::class);
      
    }
}
