<?php namespace App\Http\Controllers;

use App\Category;
use App\Manufacturer;
use Input;
use App\Product;

class HomeController extends Controller
{

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

        //Create Categories
        $categories = json_decode(Input::get('categories'));
        $category_main = trim(Input::get('category_main'));
        foreach ($categories as $key => $value) {
            $category = Category::firstOrNew(array('category_name' => $value->name));
            $category->total = $value->value;
            $category->category_parent = $category_main;
            $category->save();
        }

        // Add Product
        $product = \App\Product::firstOrNew(array('asin' => Input::get('asin')));
        $product->title = Input::get('title');
        $product->asin = Input::get('asin');
        $product->price = Input::get('price');
        $product->manufacturer = Input::get('manufacturer');
        $product->made_by_link = Input::get('made_by_link');
        $product->stars = Input::get('stars');
        $product->fba_sellers_total = Input::get('fba_sellers_total');
        $product->price_lowest_sold = Input::get('price_lowest_sold');
        $product->img = Input::get('img');
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
//		$product->status = Input::get('status');
        $product->category_rank = Input::get('category_rank');
        $product->subcategory = Input::get('subcategory');
        $product->save();

        if (Input::get('manufacturer') != "") {
            $manufacturer = Manufacturer::firstOrNew(array('company' => Input::get('manufacturer')));
            $manufacturer->company = Input::get('manufacturer');
            $manufacturer->save();

            $product->manufacturer()->associate($manufacturer);
            $product->save();
        }

        $productScore = new \App\Services\ProductScoreService($product->id);
        $product->score = $productScore->score;
        $product->save();
        // $data = Input::all();
        // $data = json_encode($data);
        // print_r($data);
    }

}
