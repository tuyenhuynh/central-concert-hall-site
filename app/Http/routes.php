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
    return redirect('/index');
});

Route::get('/home', function () {
    return redirect('/');
});

Route::auth();

Route::post('/ajax-get-concert-by-date', 'ConcertHallController@ajaxGetConcertsByDate');

Route::get('/index', 'ConcertHallController@index');

Route::get('/contact', 'ConcertHallController@contact');

Route::get('/hall', 'ConcertHallController@hall');

Route::get('/afisha', 'ConcertHallController@posters');

Route::get('/afisha/{concert_name}/{date_time}', 'ConcertHallController@poster');

Route::get('/biletnye_kassy', 'ConcertHallController@offices');

Route::post('/saveFeedback','ConcertHallController@saveFeedback');

Route::get('/admin/', 'AdminController@index');

Route::get('/admin/about', 'AdminController@about');

Route::post('/admin/update_about', 'AdminController@updateAboutText');

Route::get('/admin/index', 'AdminController@index'); //review

Route::get('/admin/concerts', 'ConcertController@concerts');

Route::get('/admin/concerts/create', 'ConcertController@getCreateConcert');

Route::post('/admin/concerts/create', 'ConcertController@postCreateConcert');

Route::get('/admin/concerts/{id}', 'ConcertController@concert');

Route::get('/admin/concerts/{id}/edit', 'ConcertController@editConcert');

Route::get('/admin/concerts/{id}/delete', 'ConcertController@deleteConcert');

Route::post('/admin/updateConcert', 'ConcertController@updateConcert');

Route::get('/admin/concerts/{id}', 'ConcertController@concert');

Route::get('/admin/feedbacks', 'FeedbackController@feedbacks');

Route::get('/admin/feedbacks/{id}', 'FeedbackController@feedback');

Route::get('/admin/feedbacks/{id}/delete', 'FeedbackController@deleteFeedback');

Route::get('/admin/offices/', 'OfficeController@offices');

Route::get('/admin/offices/{id}/edit', 'OfficeController@getUpdateOffice');

Route::post('/admin/offices/update', 'OfficeController@postUpdateOffice');

Route::get('/admin/offices/{id}/delete', 'OfficeController@deleteOffice');

Route::get('/admin/offices/create', 'OfficeController@getCreateOffice');

Route::post('/admin/offices/create', 'OfficeController@postCreateOffice');

