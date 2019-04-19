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
        $getscore = Submission::where('user_id', $id)->where('status', true)->get();
        $score = 0;
        $done = 0;
        foreach($getscore as $gs){
                $score = $score + $gs->score_achieved;
                $done++;
        }
        return view('profile.individual')->with([
            'profile'   => $profile,
            'score'     => $score,
            'sub_done'  => $done,
            ]);
    }

    public function uploadedfile($id){
        $profile = User::find($id);
        return view('profile.uploadedfile')->with([
            'profile' => $profile
        ]);
    }
}
