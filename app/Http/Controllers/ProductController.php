<?php namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use \App\Product as Product;
use Request;

/**
 * Class ProductController
 * @package App\Http\Controllers
 */
class ProductController extends Controller
{
    /**
     * View all Products
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('products/index');
    }

    /**
     * @param $filter
     * @return \Illuminate\View\View
     */
    public function filter($filter)
    {
        return view('products/index', ['data' => $filter]);
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('products/create');
    }

    /**
     * Store a newly created product in storage.
     *
     * @param CreateProductRequest|ProductRequest $request
     * @return Response
     */
    public function store(ProductRequest $request)
    {
        Product::create(Request::all());
        return redirect('products');
    }

    /**
     * Display the specified product.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
//        $data['product'] = Product::findOrFail($id);
//        return view('products/show', $data);
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
        return view('products/edit', compact('product'));
    }

    /**
     * Update the specified product in storage.
     *
     * @param  int $id
     * @param ProductRequest|Request $request
     * @return Response
     */
    public function update($id, ProductRequest $request)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect('products');
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
        return redirect('products');
    }
}
