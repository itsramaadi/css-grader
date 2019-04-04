<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class pagesController extends Controller
{
    public function search_member(){
        $users = User::orderBy('role_lvl', 'desc')->orderBy('name', 'asc')->get();
        return view('search_member')->with('users', $users);
    }
}
