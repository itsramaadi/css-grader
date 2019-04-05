<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Course;
use App\Submission;
use Auth;
use App\User;


class pagesController extends Controller
{

    public function edit_profile(){
        return view('profile.edit_profile');
    }

    public function edit_profile_put(Request $request){
        $valid = $request->validate([
            'name'  => 'max:255',
            'class' => 'max:9',
            'avatar' => 'mimetypes:image/jpeg,image/png,image/gif|max:7999',
            'absent' => 'min:1'
        ]);

        $filefinal = str_replace(' ', '', Auth::user()->name) . "." . $request->file('avatar')->getClientOriginalExtension();

        if(Auth::user()->avatar_url !== '/img/noavatar.png'){
            unlink(storage_path('app/public/useravatar/'.Auth::user()->avatar_url));
        }

        User::where('id', Auth::user()->id)->update([
            'class' => $valid['class'],
            'name'  => $valid['name'],
            'css_number' => intval($valid['absent']),
            'avatar_url' => $filefinal,
        ]);
        $request->file('avatar')->storeAs('public/useravatar', $filefinal);

    }

    public function search_member(){
        $users = User::orderBy('role_lvl', 'desc')->orderBy('name', 'asc')->get();
        return view('search_member')->with('users', $users);
    }

    public function leaderboard(){
        $leaderboard = Submission::selectRaw('user_id, sum(score_achieved) as pts')->groupBy('user_id')->orderBy('pts', 'desc')->get();
        $user = User::orderBy('id', 'asc')->get();
       return view('leaderboard')->with('leaderboard', $leaderboard)->with('user', $user);
       //return $leaderboard;
   }
}
