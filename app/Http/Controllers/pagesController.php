<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Course;
use App\Submission;
use Auth;
use App\User;


/**
 * Class pagesController
 * Home of some common pages
 * @package App\Http\Controllers
 */
class pagesController extends Controller
{

    /**
     *  Display the edit profile page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    */
    public function edit_profile()
    {
        return view('profile.edit_profile');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function edit_profile_put(Request $request)
    {
        $valid = $request->validate(
            [
            'name'  => 'max:255',
            'class' => 'max:9',
            'avatar' => 'mimetypes:image/jpeg,image/png,image/gif|max:7999',
            'absent' => 'min:1'
            ]
        );

        $filefinal = str_replace(' ', '', Auth::user()->name) . "." . $request->file('avatar')->getClientOriginalExtension();

        if(Auth::user()->avatar_url !== '/img/noavatar.png')
        {
            unlink(storage_path('app/public/useravatar/'.Auth::user()->avatar_url));
        }

        User::where('id', Auth::user()->id)->update(
            [
                'class' => $valid['class'],
                'name'  => $valid['name'],
                'css_number' => intval($valid['absent']),
                'avatar_url' => $filefinal,
            ]
        );

        // Store the file
        $request->file('avatar')->storeAs('public/useravatar', $filefinal);
        return redirect('/home')->with('status', '<b>Sukses!</b> Profil sudah diedit');

    }

    /**
     *  Display the search member page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    */
    public function search_member()
    {
        $users = User::orderBy('role_lvl', 'desc')->orderBy('name', 'asc')->get();
        return view('search_member')->with('users', $users);
    }

    /**
     * Display the leaderboard
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function leaderboard(Request $request)
    {
        @$hl = $request->input('hl');
        return view('leaderboard')->with(
           [
            'leaderboard'=> Submission::selectRaw('user_id, sum(score_achieved) as pts')->groupBy('user_id')->orderBy('pts', 'desc')->get(),
            'user'=> User::orderBy('id', 'asc')->get(),
            'hl' => $hl,
           ]
       );
    }

    /**
     * Display the example featured page, if the user does not set their homepage yet.
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function examplefeatured($id)
    {
        return view('examplefeatured')->with([
           'user'   => User::find($id),
        ]);
    }


    /**
     * Temp. solution for courses.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function gdrivefol()
    {
       return view('gdrive');
    }

}
