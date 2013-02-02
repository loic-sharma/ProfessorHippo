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

Route::get('login', 'UserController@getLogin');
Route::post('login', 'UserController@postLogin');

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