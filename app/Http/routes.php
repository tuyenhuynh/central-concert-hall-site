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

Route::get('/login', 'Authentication@getLogin');

Route::auth();

Route::resource('admin/offices', 'AdminOfficeController');

Route::resource('admin/feedbacks', 'AdminFeedbackController');

Route::resource('admin/concerts', 'AdminConcertController');

Route::resource('admin/users', 'AdminUserController');

Route::get('admin/users/{id}/activate', 'AdminUserController@activateUser');

Route::get('admin/users/{id}/deactivate', 'AdminUserController@deActivateUser');

Route::post('/ajax-get-concert-by-date', 'ConcertHallController@ajaxGetConcertsByDate');

Route::get('/index', 'ConcertHallController@index')->name('index');

Route::get('/contact', 'ConcertHallController@contact') ->name('contact');

Route::get('/hall', 'ConcertHallController@hall') ->name('hall');

Route::get('/afisha', 'ConcertHallController@posters') ->name('posters');

Route::get('/afisha/{concert_name}/{date_time}', 'ConcertHallController@concert')->name('concert');

Route::get('/biletnye_kassy', 'ConcertHallController@offices') ->name('offices');

Route::post('/ajax_post_feedback','ConcertHallController@saveFeedback');

Route::get('/admin/', 'AdminController@index');

Route::get('/admin/about', 'AdminController@about');

Route::post('/admin/update_about', 'AdminController@updateAboutText');

Route::get('/admin/index', 'AdminController@index'); //review

Route::post('/admin/update_phone_number', 'AdminController@ajaxUpdatePhoneNumber');

Route::post('/admin/update_default_purchase_code', 'AdminController@ajaxUpdateDefaultPurchaseCode');

Route::post('/admin/update_company_info', 'AdminController@ajaxUpdateCompanyInfo');

Route::post('/admin/update_hall_schema', 'AdminController@updateHallSchema');

Route::post('/admin/update_hall_text', 'AdminController@ajaxUpdateHallText');

Route::post('/admin/update_ceo_text', 'AdminController@ajaxUpdateCeoText');

Route::post('/admin/update_office_location', 'AdminController@ajaxUpdateOfficeLocation');

Route::post('/admin/update-social-network-link', 'AdminController@ajaxUpdateSocialNetworkLinks');