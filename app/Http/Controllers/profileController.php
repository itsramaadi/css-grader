<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Submission;
use Auth;
use App\User;

class profileController extends Controller
{
    public function individual($id){
        $profile = User::find($id);
        return view('profile.individual')->with('profile', $profile);
    }
}
