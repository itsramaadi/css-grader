<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth', 'sudahjadimember'])->group(function(){

    Route::get('/gdrive', 'PagesController@gdrivefol');

    Route::get('/home/review/{id}',     'LatihanCrudController@uvreview');
    Route::get('/home/edit-profile', 'PagesController@edit_profile');

    Route::put('/editmyprofile', 'PagesController@edit_profile_put');

    // Route latihan
    Route::get('/home/latihan/{id}',    'LatihanCrudController@individual_task');
    Route::get('/home/cari-anggota',    'PagesController@search_member');
    Route::post('/home/latihan/{id}',   'ItaskCrudController@store_task');

    // Route dark mode / light mode
    Route::get('/home/setlightmode',    'themeController@lightmode');
    Route::get('/home/setdarkmode',     'themeController@darkmode');

    Route::get('/example/featured.html/{id}', 'PagesController@examplefeatured');

    // See Profile
    Route::get('/home/anggota/{id}', 'profileController@individual');
    Route::get('/home/anggota/{id}/uploaded', 'profileController@uploadedfile');
    // Profile

    // Leaderboard
    Route::get('/home/leaderboard', 'PagesController@leaderboard');
});

Route::middleware(['auth', 'cekpengurus'])->group(function(){
    // Views Pengurus [GET]
    Route::get('/pengurus/home',            'PengurusController@homep');
    Route::get('/pengurus/review-submisi',  'LatihanCrudController@review');
    Route::get('/pengurus/rekap-poin',      'PengurusController@rekap_poin');
    Route::get('/pengurus/arsip/latihan',   'PengurusController@arsip_latihan');
    Route::get('/pengurus/arsip/submisi',   'PengurusController@arsip_submisi');

    //Arsip PUT
    Route::put('/pengurus/batal-arsip/latihan/{id}', 'PengurusController@batal_arsip_latihan');
    // Review
    Route::get('/pengurus/review/{id}',     'LatihanCrudController@pengurusreview');
    Route::put('/pengurus/review/{id}',     'LatihanCrudController@p_reviewupdate');

    // Latihan
    Route::get('/pengurus/buat-latihan',    'LatihanCrudController@create');
    Route::post('/pengurus/buat-latihan',   'LatihanCrudController@store');
});
