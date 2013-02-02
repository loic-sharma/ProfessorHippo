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

Route::get('/', 'HomeController@getIndex');

Route::group(array('before' => 'guest'), function()
{
	Route::get('login', 'UserController@getLogin');
	Route::post('login', 'UserController@postLogin');
	Route::get('register', 'UserController@getRegister');
	Route::post('register', 'UserController@postRegister');
});

Route::group(array('before' => 'auth'), function()
{
	Route::get('logout', 'UserController@getLogout');
});

Route::controller('api', 'ApiController');


/**
 * Remove these:
 */
Route::get('/get', function()
{
	return json_encode(array('some' => 'data'));
});

Route::post('/post', function()
{
	$teacher = new Teacher;

	$teacher->save();

	return json_encode(Input::all());
});