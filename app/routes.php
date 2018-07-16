<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*
| Main routes
*/

Route::post('/get-batches', 'AjaxController@get_batchs');

Route::get('/about', 'HomeController@about');
Route::get('/contact', 'HomeController@contact');
//Route::get('/terms', 'HomeController@about');

Route::get('/login', 'HomeController@login');
Route::post('/login', 'HomeController@login_action');

Route::get('/forgot-password','HomeController@forgot');
Route::post('/forgot-password','HomeController@forgot_action');

Route::get('/new/account', 'HomeController@register');
Route::post('/new/account', 'HomeController@register_action');

Route::get('/', 'UserController@index');

Route::get('/change-pass', 'UserController@change');
Route::post('/change-pass', 'UserController@change_action');

Route::get('/start', 'UserController@start');
Route::get('/start/{class}', 'UserController@batch');
Route::get('/start/{class}/{batch}', 'UserController@subject');
Route::get('/start/{class}/{batch}/{subject}', 'UserController@student');
Route::get('/start/{class}/{batch}/{subject}/attendance', 'AttendanceController@index');
Route::get('/start/{class}/{batch}/{subject}/attendance/take', 'AttendanceController@take');
Route::post('/start/{class}/{batch}/{subject}/attendance/take', 'AttendanceController@submit');
Route::get('/start/{class}/{batch}/{subject}/attendance/{date}', 'AttendanceController@view');
Route::post('/start/{class}/{batch}/{subject}/attendance/{date}', 'AttendanceController@Edit');
Route::get('/start/{class}/{batch}/{subject}/attendance/{attendance}/export', 'AttendanceController@export');
Route::get('/start/{class}/{batch}/{subject}/attendance/{attendance}/remove', 'AttendanceController@remove');

Route::get('/classes', 'ClassController@index');
Route::post('/classes', 'ClassController@add');
Route::get('/class/{class}', 'ClassController@view');
Route::post('/class/{class}', 'ClassController@edit');
Route::get('/class/{class}/remove', 'ClassController@remove');

Route::get('/batches', 'BatchController@index');
Route::post('/batches', 'BatchController@add');
Route::get('/batch/{batch}', 'BatchController@view');
Route::post('/batch/{batch}', 'BatchController@edit');
Route::get('/batch/{batch}/remove', 'BatchController@remove');

Route::get('/subjects', 'SubjectController@index');
Route::post('/subjects', 'SubjectController@add');
Route::get('/subject/{subject}', 'SubjectController@view');
Route::post('/subject/{subject}', 'SubjectController@edit');
Route::get('/subject/{subject}/remove', 'SubjectController@remove');

Route::get('/students', 'StudentController@index');
Route::post('/students', 'StudentController@add');
Route::get('/student/{student}', 'StudentController@view');
Route::post('/student/{student}', 'StudentController@edit');
Route::get('/student/{student}/remove', 'StudentController@remove');

Route::get('/logout', function() {
	Auth::logout();
	return Redirect::to('/');
});


//---------------------------------------------------------------------
	// 404
	//---------------------------------------------------------------------

	Route::get('/{link1}','ErrorController@link1');
	Route::get('/{link1}/{link2}','ErrorController@link2');
	Route::get('/{link1}/{link2}/{link3}','ErrorController@link3');
	Route::get('/{link1}/{link2}/{link3}/{link4}','ErrorController@link4');
	Route::get('/{link1}/{link2}/{link3}/{link4}/{link5}','ErrorController@link5');
	Route::get('/{link1}/{link2}/{link3}/{link4}/{link5}/{link6}','ErrorController@link6');