<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Submission;
use Auth;
use App\User;

class PengurusController extends Controller
{

    /**
     * Show the homepage of administrator
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function homep()
    {
        return view('pengurus.home')->with([
            'notverified' => User::where('role_lvl', 0)->count(),
            'totaluser' => User::all()->count(),
            'alltask' => Course::all()->count(),
            'notchecked' => Submission::where('status', false)->count()
        ]);
    }


    /**
     * Show the point tally page (same as leaderboard, but with added content + excel export)
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function rekap_poin()
    {
        return view('pengurus.rekap_poin')->with(
            [
                'leaderboard'   => Submission::selectRaw('user_id, sum(score_achieved) as pts')->groupBy('user_id')->orderBy('pts', 'desc')->get(),
                'user'          => User::orderBy('id', 'asc')->get()
            ]
        );
    }

    /**
     * Show the exercise archive page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function arsip_latihan()
    {
        return view('pengurus.arsip_latihan')->with('course_archived', Course::where('course_archived', true)->orderBy('created_at', 'asc')->get());
    }

    /**
     * Show the submission archive
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function arsip_submisi()
    {
//        return view('pengurus.arsip_submisi')->with([
//            'submission' => Submission::where('status', true)->orderBy('course_id', 'asc')->orderBy('created_at', 'asc')->get(),
//        ]);
        return Submission::where('status', true)->groupBy('course_id')->orderBy('course_id', 'asc')->orderBy('created_at', 'asc')->get();
    }

    /**
     * Cancel the archival of an excercise
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function batal_arsip_latihan($id)
    {
        Course::where('id',$id)->update([
            'course_archived' => false
        ]);
        return redirect('/pengurus/arsip/latihan')->with('status', '<b>Sukses,</b> tugas sudah tidak lagi di arsip!');
    }
}
