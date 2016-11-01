<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::get('/cabinet/history', 'HomeController@history');
Route::get('/cabinet/records', 'HomeController@records');
Route::get('/cabinet/recommendations', 'HomeController@recommendations');
Route::get('/cabinet/medicines', 'HomeController@medicines');
Route::get('/cabinet/clinics', 'HomeController@clinics');
Route::get('/cabinet/doctors', 'HomeController@doctors');

Route::get('/cabinet', 'HomeController@index');
