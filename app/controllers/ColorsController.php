<?php

class ColorsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('color.index')
			->with('colors', Color::all());
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('color.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input_data = Input::all();
		$color = new Color;
		$color->color = $input_data['color'];
		$color->code = $input_data['code'];
		$color->save();
		$message = 'Color created: <div style="background-color:{{ $color->code }}">{{ $color->color }}</div>';
		return Redirect::route('color.index')
			->with('message', $message);
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
	public function edit($colorid)
	{
		$color = Color::find($colorid);
		return View::make('color.edit')
			->with('color', $color);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($colorid)
	{
		$color = Color::find($colorid);
		$input_data = Input::only('color', 'code');
		$color->color = $input_data['color'];
		$color->code = $input_data['code'];
		$color->save();
		return Redirect::route('color.index');
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
