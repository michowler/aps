<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class locations extends Model
{
    protected $primaryKey = 'locations_id';
    public $incrementing = true;

    public function locations()
    {
    	return $this -> belongsToMany(locations::class,'tag_surveys_locations','surveys_id','locations_id');
    }
}
