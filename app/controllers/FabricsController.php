<?php

class FabricsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$fabrics = Fabric::all();
		return View::make('fabric.index')
			->with('fabrics', $fabrics);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('fabric.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$fabric = new Fabric;
		$fabric->name = Input::get('name');
		$fabric->description = Input::get('description');
		$fabric->save();
		return Redirect::route('fabric.index');
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
	public function edit($fabricid)
	{
		$fabric = Fabric::find($fabricid);
		return View::make('fabric.edit')
			->with('fabric', $fabric);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($fabricid)
	{
		$fabric = Fabric::find($fabricid);
		$fabric->name = Input::get('name');
		$fabric->description = Input::get('description');
		$fabric->save();
		return Redirect::route('fabric.index');
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
