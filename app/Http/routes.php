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

use App\MyProduct;
use App\Product;
use App\Tracker;
use Carbon\Carbon;

Route::get('/', 'ProductController@index');

Route::get('/test', function () {
    $today = Carbon::today();
    $products = DB::select(DB::raw("SELECT sellerId, stock, created_at FROM tracker WHERE asin = 'B0034KBBQ0'"));

//    $products = DB::select(DB::raw("select * FROM `tracker` where date(created_at) = CURDATE() and time(created_at) > TIME('15:00:00') group by asin ORDER BY `tracker`.`created_at`  DESC"));
//    $products = DB::select(DB::raw("select * FROM `tracker` where DATE(created_at) = date_add(curdate(), interval -1 day) ORDER BY asin, sellerId, stock, created_at ASC"));

    return $products;
});

Route::get('/test-myproducts', function () {
    $products = MyProduct::with(['product'])->get();


    return $products;
});

Route::get('/product/json', function () {
    return Product::all(['asin']);
});

Route::get('/product/json/{id}', function ($id) {
    return [Product::find($id)];
});

Route::get('/product-tracker', function () {

    $results = DB::select( DB::raw("SELECT asin FROM products where asin not in(Select asin from tracker where date(created_at) = curdate() group by asin)") );

    return $results;





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
Route::resource('tracker', 'TrackerController');