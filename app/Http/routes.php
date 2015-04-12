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

Route::get('/', 'WelcomeController@index');

Route::get('/test', function(){
	echo "hey";
	echo csrf_token();
});



Route::post('/test', function(){
	header('Access-Control-Allow-Origin: *');
	$data = Input::all();
	$data = json_encode($data);
	print_r($data);
});

Route::get('home', 'HomeController@index');
Route::get('scriptlet', 'HomeController@scriptlet');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
