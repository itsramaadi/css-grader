<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    // One-To-Many Courses
    public function courses(){
        return $this->hasMany('App\Course');
    }

    // One-To-Many Users
    public function users(){
        return $this->hasMany('App\User');
    }
}
