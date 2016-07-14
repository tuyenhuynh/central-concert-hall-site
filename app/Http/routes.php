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

use Illuminate\Support\Facades\Auth;
use App\User ;

Route::get('/', function () {
    return view('index');
});

Route::get('/home', function () {
    return redirect('/');
});

Route::auth();

Route::get('/index', 'ConcertHallController@index');

Route::get('/afisha', 'ConcertHallController@posters');

Route::get('/afisha/{concert_name}/{date_time}', 'ConcertHallController@concert');

Route::get('/biletnye_kassy', 'ConcertHallController@offices');

Route::get('/contact', 'ConcertHallController@contact');

Route::post('/saveFeedback','ConcertHallController@saveFeedback');

Route::get('/hall', 'ConcertHallController@hall');

Route::get('/admin/', 'AdminController@index');

Route::get('/admin/index', 'AdminController@index');

Route::get('/admin/concerts', 'AdminController@concerts');

Route::get('/admin/concerts/create', 'AdminController@createConcert');

Route::get('/admin/concerts/{id}/edit', 'AdminController@editConcert');

Route::get('/admin/concerts/{id}', 'AdminController@concert');

Route::get('/admin/feedbacks', 'AdminController@feedbacks');

Route::get('/admin/feedbacks/{id}', 'AdminController@feedback');

Route::get('/admin/offices/', 'AdminController@offices');

Route::get('/admin/offices/id/edit', 'AdminController@editOffice');

Route::get('/admin/offices/create', 'AdminController@createOffice');

Route::get('/admin/about', 'AdminController@about');

Route::post('/admin/update_about', 'AdminController@updateAboutText');
