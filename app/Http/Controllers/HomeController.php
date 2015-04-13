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


		
		echo Input::get("product_productTitle");
		echo Input::get("product_price");
		echo Input::get("product_madeBy");
		echo Input::get("product_madeByLink");
		echo Input::get("customers_totalCustomerReviews");
		echo Input::get("merchantInfo_hasMerchantInfo");
		echo Input::get("merchantInfo_newSellers_total");
		echo Input::get("merchantInfo_newSellers_link");
		echo Input::get("merchantInfo_newSellers_lowestSellingPrice");
		echo Input::get("merchantInfo_usedSellers_total");
		echo Input::get("merchantInfo_usedSellers_lowestSellingPrice");
		echo Input::get("merchantInfo_soldBy");
		echo Input::get("merchantInfo_soldBySeller");
		echo Input::get("merchantInfo_fulfilledBy");
		echo Input::get("merchantInfo_isFBA");
		echo Input::get("merchantInfo_SellerFBACount");
		echo Input::get("product_details_dimensions");
		echo Input::get("product_details_shippingWeight");
		echo Input::get("product_details_ASIN");
		echo Input::get("product_details_ItemModelNumber");
		echo Input::get("product_details_manufacturerPartNumber");
		echo Input::get("product_details_category_rank");
		echo Input::get("product_details_category_category");
		echo Input::get("product_details_subcategory_category");
 


		$product = new \App\Product;
		$product->product_productTitle = Input::get('product_productTitle');
		$product->product_price = Input::get('product_price');
		// $product->product_madeBy = Input::get('product_madeBy');
		// $product->product_madeByLink = Input::get('product_madeByLink');
		// $product->customers_totalCustomerReviews = Input::get('customers_totalCustomerReviews');
		// $product->merchantInfo_hasMerchantInfo = Input::get('merchantInfo_hasMerchantInfo');
		// $product->merchantInfo_newSellers_total = Input::get('merchantInfo_newSellers_total');
		// $product->merchantInfo_newSellers_link = Input::get('merchantInfo_newSellers_link');
		// $product->merchantInfo_newSellers_lowestSellingPrice = Input::get('merchantInfo_newSellers_lowestSellingPrice');
		// $product->merchantInfo_usedSellers_total = Input::get('merchantInfo_usedSellers_total');
		// $product->merchantInfo_usedSellers_lowestSellingPrice = Input::get('merchantInfo_usedSellers_lowestSellingPrice');
		// $product->merchantInfo_soldBy = Input::get('merchantInfo_soldBy');
		// $product->merchantInfo_soldBySeller = Input::get('merchantInfo_soldBySeller');
		// $product->merchantInfo_fulfilledBy = Input::get('merchantInfo_fulfilledBy');
		// $product->merchantInfo_isFBA = Input::get('merchantInfo_isFBA');
		// $product->merchantInfo_SellerFBACount = Input::get('merchantInfo_SellerFBACount');
		// $product->product_details_dimensions = Input::get('product_details_dimensions');
		// $product->product_details_shippingWeight = Input::get('product_details_shippingWeight');
		// $product->product_details_ASIN = Input::get('product_details_ASIN');
		// $product->product_details_ItemModelNumber = Input::get('product_details_ItemModelNumber');
		// $product->product_details_manufacturerPartNumber = Input::get('product_details_manufacturerPartNumber');
		// $product->product_details_category_rank = Input::get('product_details_category_rank');
		// $product->product_details_category_category = Input::get('product_details_category_category');
		// $product->product_details_subcategory_category = Input::get('product_details_subcategory_category');
		// $product->save();


		// $data = Input::all();
		// $data = json_encode($data);
		// print_r($data);
	}

}
