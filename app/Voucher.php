<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    //
    protected $primaryKey = 'vouchers_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'terms', 'outlet', 'vouchers_types_id', 'merchants_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'expiry_date' => 'datetime',
    ];

    public function merchants()
    {
      return $this->belongsTo(Merchant::class, 'merchants_id');      
    }
    
}
