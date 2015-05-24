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

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::get('/', 'ProductController@index');
Route::get('/test', function () {
    $products = Product::select(array('*'));

    return Datatables::of($products)
        ->make(true);
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

Route::get('/products/data', function () {
    $products = Product::select(array('*'));
    return Datatables::of($products)
        ->make(true);
});

Route::post('/products/data', function () {
    $product = Product::firstOrNew(['asin' => Input::get('data')['asin']]);
    $product->update(Input::get('data'));
    return $product;
});

Route::post('/editable', function () {

    $pk = Input::get('pk');
    $table_name = Input::get('table_name');
    $name = Input::get('name');
    $value = Input::get('value');

//    return Input::all();
    DB::table($table_name)
        ->where('id', $pk)
        ->update(array($name => $value));

    return Input::all();
});

Route::get('/product-tracker', function () {
    $results = DB::select(DB::raw("SELECT asin FROM products where asin not in(Select asin from tracker where date(created_at) = curdate() group by asin)"));
    return $results;
});

Route::get('home', 'HomeController@index');


Route::post('scriptlet', 'HomeController@saveData');

Route::resource('products', 'ProductController');
Route::resource('my-products', 'MyProductsController');
Route::resource('tracker', 'TrackerController');
Route::resource('manufacturers', 'ManufacturerController');