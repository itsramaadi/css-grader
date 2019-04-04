<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengurusController extends Controller
{
    public function homep(){
        return view('pengurus.home');
    }
}
