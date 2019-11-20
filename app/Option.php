<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Option;

class Option extends Model
{
     public function questions()
    {
        return $this->belongsToMany(Question::class,'options','options_id','questions_id');
    }
    
    public function users()
    {
      return $this->belongsTo(User::class, 'tag_respondents_options','users_id');      
    }

}
