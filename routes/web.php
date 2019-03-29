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
    Route::get('/home/review/{id}', 'LatihanCrudController@uvreview');
    // Route latihan
    Route::get('/home/latihan/{id}', 'LatihanCrudController@individual_task');
    Route::post('/home/latihan/{id}', 'ItaskCrudController@store_task');
});

Route::middleware(['auth', 'cekpengurus'])->group(function(){
    Route::get('/pengurus/review-submisi', 'LatihanCrudController@review');
    Route::get('/pengurus/review/{id}', 'LatihanCrudController@pengurusreview');
    Route::put('/pengurus/review/{id}', 'LatihanCrudController@p_reviewupdate');
    Route::get('/pengurus/buat-latihan', 'LatihanCrudController@create');
    Route::post('/pengurus/buat-latihan', 'LatihanCrudController@store');
});
