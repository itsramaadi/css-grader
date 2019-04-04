<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class themeController extends Controller
{
    public function lightmode(){
        session(['themeMode' => 'light']);
        return back()->withInput();
    }

    public function darkmode(){
        session(['themeMode' => 'dark']);
        return back()->withInput();
    }
}
