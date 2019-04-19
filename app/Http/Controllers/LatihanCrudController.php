<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Submission;
use Auth;
use App\User;

class LatihanCrudController extends Controller
{
    public function create(){
            return view('pengurus.latihan.buat_latihan');

    }

    public function store(Request $request){
        $validdata = $request->validate([
            'exc_title' => 'required|max:255',
            'exc_desc'  => 'required',
            'exc_pts'   => 'required|max:3',
        ]);

        // Simpan ke database
        $dbCourse = new Course;
        $dbCourse->course_name = $validdata['exc_title'];
        $dbCourse->description = $validdata['exc_desc'];
        $dbCourse->max_score = intval($validdata['exc_pts']);
        $dbCourse->course_archived = false;
        $dbCourse->save();

        return Redirect('/home')->with('status', '<b>Sukses!</b> Latihan sudah dibuat!');
    }

    public function individual_task(Request $request, $id){
        $taskcount = Submission::where('course_id', $id)->where('user_id', Auth::user()->id)->get();
        $task_info = Course::find($id);
        if(@$taskcount->count() > 0){
            return redirect('/home')->with('status', '<b>Info:</b> Sudah kamu kerjakan. Lihat review di tab belum di review. atau bila sudah di review, akan muncul disamping.');
        }elseif($task_info->course_archived == true){
            return redirect('/home')->with('status', '<b>Info:</b> Maaf, tugas ini sudah ditutup. Sayang sekali, anda tidak bisa submisi lagi!');
        }else{
            return view('see_course')->with('course', $task_info);
        }
       //return $i_task_course;
    }

    public function uvreview($id){
        @$submission = Submission::find($id);
        $reviewer;
        if($submission->status == true){
            $reviewer = User::find($submission->reviewer_id);
        }else{
            $reviewer = 'belum di review';
        }
        return view('review_user')->with('submission', $submission)->with('reviewer', $reviewer);
    }

    public function review(){
        $all_notclosed = Submission::where('status', false)->orderBy('course_id', 'asc')->orderBy('created_at', 'asc')->get();
        return view('pengurus.latihan.review_latihan')->with('submission', $all_notclosed);
    }

    public function pengurusreview($id){
        $submission = Submission::find($id);
        return view('pengurus.latihan.review_individual')->with('submission', $submission);
    }

    public function p_reviewupdate(Request $request , $id){
        $valid = $request->validate([
            'sub_poin'  => 'required|max:3',
            'sub_notes' => 'required'
        ]);
        Submission::where('id',$id)->update([
            'status' => true,
            'notes' => $valid['sub_notes'],
            'score_achieved' => intval($valid['sub_poin']),
            'reviewer_id' => Auth::user()->id,
        ]);
        return redirect('/pengurus/review-submisi')->with('status', '<b>Sukses!</b> Sudah anda review!');
    }
}
