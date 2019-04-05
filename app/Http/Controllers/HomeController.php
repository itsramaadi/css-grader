<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Course;
use App\Submission;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role_lvl == 0){
            abort(403, 'Untuk masuk, anda harus diverifikasi oleh pengurus CSS.');
        }elseif(Auth::user()->role_lvl >= 1){
            $pendingsub = Submission::where('status', false)->where('user_id', Auth::user()->id)->get();
            $task = Course::where('course_archived', false)->get();
            $mysubmission = Submission::where('user_id', Auth::user()->id)->where('status', true)->get();
            $score = 0;
            $avatar;
            if(Auth::user()->avatar_url == '/img/noavatar.png'){
                $avatar = asset('/img/noavatar.png');
            }else{
                $avatar = asset('/storage/useravatar/' . Auth::user()->avatar_url);
            }

            foreach($mysubmission as $ms){
                $score = $score + $ms->score_achieved;
            }
            return view('home')->with('task', $task)->with([
                'pendingsub' => $pendingsub,
                'score' => $score,
                'reviewed' => $mysubmission,
                'avatar_url' => $avatar
            ]);
        }
    }
}
