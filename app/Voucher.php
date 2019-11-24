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
        'vouchers_id', 'title', 'terms', 'stores', 'vouchers_types_id', 'merchants_id', 'logo', 'qr_code', 'interests', 'status', 'max_redeem'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'expiry_date' => 'datetime',
    ];

    protected $dates = ['expiry_date'];

    public function merchants()
    {
      return $this->belongsTo(Merchant::class, 'merchants_id');      
    }

    public function surveys()
    {
        return $this->hasMany(surveys::class,'surveys_id');
    }

    // public function surveys()
    // {
    //     return $this->belongsToMany(Voucher::class, 'surveys','interests_id', 'surveys_id');
    // }

    public function users()
    {
      return $this->belongsTo(User::class, 'users_id');      
    }

    public function stores()
    {
      return $this->belongsToMany(Store::class, 'tag_stores_vouchers', 'vouchers_id', 'stores_id' )->withTimestamps();
    }

    public function interests()
    {
        return $this->belongsToMany(Interest::class, 'tag_interests_vouchers', 'vouchers_id' , 'interests_id')->withTimestamps();
    }



    
}
