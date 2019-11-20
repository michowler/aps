<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\surveys;
use App\Option;

class Question extends Model
{

    protected $casts =[
        'content'=> 'array',];

	protected $primaryKey = 'questions_id';
    public $incrementing = true;

    protected $fillable = [ 'questions_title','content','surveys_id' ];

     public function surveys()
    {
    	return $this->belongsToMany(surveys::class,'questions', 'surveys_id');
    }

     public function options()
    {
        return $this->hasMany(Option::class,'questions_id');
    }

    protected $table='questions';
    // public function questions_options()
    // {
    // 	return $this->belongsToMany()
    // }
}
