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


// default route for language translate
Route::get('lang/{lang}', 'LanguageController@swap');



// home route
Route::get('/', function () {
    return view('welcome');
});

