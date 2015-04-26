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

use App\Product;

Route::get('/', 'ProductController@index');

Route::get('/test', function(){
	$product =  Product::where('asin', "=", "B005GdddNLHZ8")->get();
	return count($product);
});

Route::get('/product/json', function(){
	return Product::where('new_sellers_link', '!=', 'null')->get();
});

Route::get('home', 'HomeController@index');
Route::get('scriptlet', 'HomeController@scriptlet');
Route::post('scriptlet', 'HomeController@saveData');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::resource('products', 'ProductController');
Route::resource('my-products', 'MyProductsController');