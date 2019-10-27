<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{    
    protected $primaryKey = 'vouchers_id';
    public $incrementing = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'vouchers_id', 'title', 'terms', 'outlet', 'vouchers_types_id', 'merchants_id', 'logo', 'qr_code', 'interests'
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

    public function stores()
    {
      return $this->belongsToMany(Store::class, 'tag_stores_vouchers', 'vouchers_id', 'stores_id' );
    }

    public function interests()
    {
        return $this->belongsToMany(Interest::class, 'tag_interests_vouchers', 'vouchers_id' , 'interests_id');
    }



    
}
