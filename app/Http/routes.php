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
Route::get('/product/json', function(){
	return \App\Product::all();
});

Route::get('home', 'HomeController@index');
Route::get('scriptlet', 'HomeController@scriptlet');
Route::post('scriptlet', 'HomeController@saveData');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::resource('product', 'ProductController');