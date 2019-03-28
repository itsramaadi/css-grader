<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use Auth;

class LatihanCrudController extends Controller
{
    public function create(){
        if(Auth::user()->role_lvl < 2){
            abort('403', 'Tab ini dikhususkan untuk pengurus CSS');
        }else{
            return view('pengurus.latihan.buat_latihan');
        }
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

    public function individual_task(){
        
    }
}
