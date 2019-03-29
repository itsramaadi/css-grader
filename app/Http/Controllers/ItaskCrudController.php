<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Submission;
use Auth;

class ItaskCrudController extends Controller
{
    public function store_task(Request $request, $id){
        // Validation
        $validated = $request->validate(
            ['course_file' => 'required|mimetypes:text/html|max:2000']
        );
        $filefinal = str_replace(' ', '', $request->file('course_file')->getClientOriginalName())."-".uniqid()."-uploadby-".str_replace(' ', '', Auth::user()->name).".".$request->file('course_file')->getClientOriginalExtension();

        $submission = new Submission;
        $submission->course_id = intval($id);
        $submission->user_id = Auth::user()->id;
        $submission->notes = "masukkan catatan...";
        $submission->file_name = $filefinal;
        $submission->score_achieved = 0;
        $submission->reviewer_id = 0;
        $submission->save();
        $request->file('course_file')->storeAs('public/submittedcourse', $filefinal);
        return Redirect('/home')->with('statuss', 'Tugas anda sudah diupload!');

    }
}
