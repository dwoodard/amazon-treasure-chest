<?php namespace App\Http\Controllers;

use App\Http\Requests\ManufacturerRequest;
use App\Http\Controllers\Controller;
use App\Manufacturer;
use Request;

class ManufacturerController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $data['manufacturers'] = Manufacturer::all();

        if(Request::ajax()){
            return $data['manufacturers'];
        }

        return view('manufacturers/index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('manufacturers/create');
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ManufacturerRequest $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $data['manufacturer'] = Manufacturer::find($id);

        if(Request::ajax()){
            return $data['manufacturer'];
        }
        return view('manufacturers/show', $data);
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
