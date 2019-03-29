<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    public function courses(){
        return $this->belongsTo('App\Course','course_id');
    }

    public function users(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
