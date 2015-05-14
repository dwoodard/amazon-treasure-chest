<?php namespace App\Http\Controllers;

use App\Http\Requests\MyProductRequest;
use \App\MyProduct as MyProduct;
use Request;




class MyProductsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $data['products'] = MyProduct::with('product')->get();
//        return $data['products'];

        return view('my_products/index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param MyProductRequest $request
     * @param $productId
     * @return Response
     */
	public function store(MyProductRequest $request)
	{
        MyProduct::create(['product_id' => $request->product_id]);
        return redirect('my-products');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
