<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Product as Product;

class ProductController extends Controller
{
    /**
     * Display a listing of products
     *
     * @return Response
     */
    public function index()
    {
        $data['products'] = Product::all();
        return view('products/index', $data);
    }

    /**
     * Show the form for creating a new product
     *
     * @return Response
     */
    public function create()
    {
        return View::make('products/create');
    }

    /**
     * Store a newly created product in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make($data = Input::all(), Product::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        Product::create($data);

        return Redirect::route('products/index');
    }

    /**
     * Display the specified product.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $data['product'] = Product::findOrFail($id);

        return view('products/show', $data);
    }

    /**
     * Show the form for editing the specified product.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        return View::make('products/edit', compact('product'));
    }

    /**
     * Update the specified product in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $product = Product::findOrFail($id);

        $validator = Validator::make($data = Input::all(), Product::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $product->update($data);

        return Redirect::route('products/index');
    }

    /**
     * Remove the specified product from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        Product::destroy($id);

        return Redirect::route('products/index');
    }
}
