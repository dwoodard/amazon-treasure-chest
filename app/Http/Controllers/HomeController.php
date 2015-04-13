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
		$product->product_productTitle = Input::get('product_productTitle');
		$product->product_details_ASIN = Input::get('product_details_ASIN');
		$product->product_price = Input::get('product_price');
		$product->product_madeBy = Input::get('product_madeBy');
		$product->product_madeByLink = Input::get('product_madeByLink');
		$product->customers_totalCustomerReviews = Input::get('customers_totalCustomerReviews');
		$product->merchantInfo_hasMerchantInfo = Input::get('merchantInfo_hasMerchantInfo');
		$product->merchantInfo_newSellers_total = Input::get('merchantInfo_newSellers_total');
		$product->merchantInfo_newSellers_link = Input::get('merchantInfo_newSellers_link');
		$product->merchantInfo_newSellers_lowestSellingPrice = Input::get('merchantInfo_newSellers_lowestSellingPrice');
		$product->merchantInfo_soldBy = Input::get('merchantInfo_soldBy');
		$product->merchantInfo_soldBySeller = Input::get('merchantInfo_soldBySeller');
		$product->merchantInfo_fulfilledBy = Input::get('merchantInfo_fulfilledBy');
		$product->merchantInfo_isFBA = Input::get('merchantInfo_isFBA');
		$product->merchantInfo_SellerFBACount = Input::get('merchantInfo_SellerFBACount');
		$product->product_details_dimensions = Input::get('product_details_dimensions');
		$product->product_details_shippingWeight = Input::get('product_details_shippingWeight');
		$product->product_details_ItemModelNumber = Input::get('product_details_ItemModelNumber');
		$product->product_details_manufacturerPartNumber = Input::get('product_details_manufacturerPartNumber');
		$product->product_details_category_rank = Input::get('product_details_category_rank');
		$product->product_details_category_category = Input::get('product_details_category_category');
		$product->product_details_subcategory_category = Input::get('product_details_subcategory_category');
		$product->save();


		
		// $data = Input::all();
		// $data = json_encode($data);
		// print_r($data);
	}

}
