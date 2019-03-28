<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Course;

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
            $belum_selesai = Course::where('course_archived', false)->get();
            return view('home')->with('tugas_belum', $belum_selesai);
            //dd($belum_selesai);
        }
    }
}
