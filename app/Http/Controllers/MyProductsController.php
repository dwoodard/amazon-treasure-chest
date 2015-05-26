<?php namespace App\Http\Controllers;

use App\Http\Requests\MyProductRequest;
use \App\MyProduct as MyProduct;
use Request;

class MyProductsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data['products'] = MyProduct::with('product')->get();
        return view('my_products/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('my_products/create');
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

        $myProduct = MyProduct::create(['product_id' => $request->product_id]);
        if ($request->ajax())
        {
            return $myProduct;
        }
        return redirect('my-products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $data['my_product'] = MyProduct::findOrFail($id);

        return view('products/show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $data['my_product'] = Product::find($id);
        return view('my_products/edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id, MyProductRequest $request)
    {
        $myProduct = MyProduct::findOrFail($id);

        $myProduct->update($request->all());

        return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        MyProduct::destroy($id);
        return redirect('my-products');
    }

}
