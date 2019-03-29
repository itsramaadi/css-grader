<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function submissions(){
        return $this->hasMany('App\Submission');
    }
}
