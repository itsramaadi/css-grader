<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class themeController extends Controller
{

    /**
     * Change the theme to light
     * @return \Illuminate\Http\RedirectResponse
     */
    public function lightmode()
    {
        session(['themeMode' => 'light']);
        return back()->withInput();
    }

    /**
     * Change the theme to dark
     * @return \Illuminate\Http\RedirectResponse
     */
    public function darkmode(){
        session(['themeMode' => 'dark']);
        return back()->withInput();
    }
}
