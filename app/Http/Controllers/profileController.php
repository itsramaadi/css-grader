<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Submission;
use Auth;
use App\User;

class profileController extends Controller
{

    /**
     * Show the general page of an user
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function individual($id)
    {
        $getscore = Submission::where('user_id', $id)->where('status', true)->get();
        $score = 0;
        $done = 0;
        foreach($getscore as $gs){
                $score = $score + $gs->score_achieved;
                $done++;
        }
        return view('profile.individual')->with([
            'profile'   => User::find($id),
            'score'     => $score,
            'sub_done'  => $done,
            ]);
    }

    /**
     * Show the uploaded file page
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function uploadedfile($id)
    {
        return view('profile.uploadedfile')->with([
            'profile' => User::find($id)
        ]);
    }
}
