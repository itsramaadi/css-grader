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

Route::middleware(['auth'])->group(function(){
    Route::get('/pengurus/buat-latihan', 'LatihanCrudController@create');
    Route::post('/pengurus/buat-latihan', 'LatihanCrudController@store');

    // Latihan woo!
    Route::get('/home/latihan/{id}', 'LatihanCrudController@individual_task');
});
