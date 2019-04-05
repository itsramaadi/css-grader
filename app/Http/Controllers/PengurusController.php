<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Submission;
use Auth;
use App\User;

class PengurusController extends Controller
{
    public function homep(){
        $notverified = User::where('role_lvl', 0)->count();
        $totaluser = User::all()->count();
        $alltask = Course::all()->count();
        $notchecked = Submission::where('status', false)->count();
        return view('pengurus.home')->with([
            'notverified' => $notverified,
            'totaluser' => $totaluser,
            'alltask' => $alltask,
            'notchecked' => $notchecked
        ]);
    }

    public function rekap_poin(){
        $leaderboard = Submission::selectRaw('user_id, sum(score_achieved) as pts')->groupBy('user_id')->orderBy('pts', 'desc')->get();
        $user = User::orderBy('id', 'asc')->get();
        return view('pengurus.rekap_poin')->with('leaderboard', $leaderboard)->with('user', $user);;
    }

    public function arsip_latihan(){
        $course_archived = Course::where('course_archived', true)->orderBy('created_at', 'asc')->get();
        return view('pengurus.arsip_latihan')->with('course_archived', $course_archived);
    }

    public function arsip_submisi(){
        $submission_arc = Submission::where('status', true)->orderBy('course_id', 'asc')->orderBy('created_at', 'asc')->get();
        return view('pengurus.arsip_submisi')->with([
            'submission' => $submission_arc,
        ]);
    }

    public function batal_arsip_latihan($id){
        Course::where('id',$id)->update([
            'course_archived' => false
        ]);
        return redirect('/pengurus/arsip/latihan')->with('status', '<b>Sukses,</b> tugas sudah tidak lagi di arsip!');
    }
}
