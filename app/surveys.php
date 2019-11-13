<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Question;

class surveys extends Model
{
    protected $primaryKey = 'surveys_id';
    public $incrementing = true;

    protected $fillable = [ 'surveys_id','surveys_title','surveys_description'];
    
    //Michelle
    public function vouchers()
    {
        return $this->belongsTo(Voucher::class,'vouchers_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class,'tag_respondents_surveys','surveys_id','users_id')->withTimestamps()->withPivot('voucher_redeem_status', 'voucher_redemption_date');
    }

    //Alice
    public function interests()
    {
    	return $this->belongsToMany(Interest::class,'tag_interest_surveys','surveys_id','interests_id');
    }

    public function locations()
    {
    	return $this->belongsToMany(locations::class,'tag_surveys_locations', 'surveys_id','locations_id');
    }

    public function questions()
    {
        return $this->hasMany(Question::class,'questions','questions_id','surveys_id');
    }

    // public function vouchers()
    // {
    //     return $this->belongsToMany(Voucher::class,'surveys','vouchers_id','surveys_id');
    // }


}
