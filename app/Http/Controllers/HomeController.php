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
        if(Auth::user()->role_lvl == 0)
        {
            abort(403, 'Untuk masuk, anda harus diverifikasi oleh pengurus CSS.');
        }
        elseif(Auth::user()->role_lvl >= 1)
        {
            $mysubmission = Submission::where('user_id', Auth::user()->id)->where('status', true)->get();
            $score = 0;
            $done = 0;
            $avatar;
            if(Auth::user()->avatar_url == '/img/noavatar.png')
            {
                $avatar = asset('/img/noavatar.png');
            }
            else
            {
                $avatar = asset('/storage/useravatar/' . Auth::user()->avatar_url);
            }

            foreach($mysubmission as $ms)
            {
                $score = $score + $ms->score_achieved;
                $done++;
            }

            return view('home')->with(
                [
                    'score'         => $score,
                    'reviewed'      => $mysubmission,
                    'avatar_url'    => $avatar,
                    'done_proj'     => $done,
                    'task'          => Course::where('course_archived', false)->get(),
                    'pendingsub'    => Submission::where('status', false)->where('user_id', Auth::user()->id)->get(),
                    'pending_count' => Submission::where('status', false)->where('user_id', Auth::user()->id)->count(),
                    'reviewed_s'    => Submission::where('user_id', Auth::user()->id)->where('score_achieved', '>', 0)->count(),
                ]
            );

        }
    }
}
