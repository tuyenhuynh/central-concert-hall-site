<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home');
});

Route::auth();

Route::get('/home', 'ConcertHallController@index');

Route::get('/afisha', 'ConcertHallController@posters');

Route::get('/afisha/{concert_name}/{date_time}', 'ConcertHallController@concert');

Route::get('/biletnye_kassy', 'ConcertHallController@offices');

Route::get('/contact', 'ConcertHallController@contact');

Route::get('/hall', 'ConcertHallController@hall');

