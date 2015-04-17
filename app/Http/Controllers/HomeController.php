<?php namespace App\Http\Controllers;

use Input;
use Product;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{

	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		header('Access-Control-Allow-Origin: *');

		$this->middleware('auth');
		return view('home');
	}

	/**
	 * Show the Scriplet.
	 *
	 * @return Response
	 */
	public function scriptlet()
	{
		return view('scriptlet');
	}

	/**
	 * Show the Scriplet.
	 *
	 * @return Response
	 */
	public function saveData()
	{
		header('Access-Control-Allow-Origin: *');
		$product = new \App\Product;
		$product->title = Input::get('title');
		$product->asin = Input::get('asin');
		$product->price = Input::get('price');
		$product->manufacturer = Input::get('manufacturer');
		$product->made_by_link = Input::get('made_by_link');
		$product->stars = Input::get('stars');
		$product->fba_sellers_total = Input::get('fba_sellers_total');
		$product->price_lowest_sold = Input::get('price_lowest_sold');
		$product->url = Input::get('url');
		$product->customer_reviews_total = Input::get('customer_reviews_total');
		$product->sold_by = Input::get('sold_by');
		$product->new_sellers_total = Input::get('new_sellers_total');
		$product->new_sellers_link = Input::get('new_sellers_link');
		$product->item_model_number = Input::get('item_model_number');
		$product->manufacturer_part_number = Input::get('manufacturer_part_number');
		$product->dimensions = Input::get('dimensions');
		$product->weight = Input::get('weight');
		$product->category = Input::get('category');
		$product->category_rank = Input::get('category_rank');
		$product->subcategory = Input::get('subcategory');
		$product->save();

		// $data = Input::all();
		// $data = json_encode($data);
		// print_r($data);
	}

}
