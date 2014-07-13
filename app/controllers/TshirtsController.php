<?php

class TshirtsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$styles = Style::all();
		$filterStyles = Input::get('filters');
		if($filterStyles != NULL){
			$tshirts = Tshirt::orderByFilter($filterStyles);
		}
		else{
			$tshirts = Tshirt::all();
			$filterStyles = array();
		}
		return View::make('tshirt.index')
			->with('tshirts', $tshirts)
			->with('styles', $styles)
			->with('filters', $filterStyles);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('tshirt.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$image = Input::file('image');
		$input_data = Input::only('title', 'description', 'tags', 'sizes', 'styles', 'fabrics', 'wash_care', 'price', 'colors');
		$destination = base_path().'/public/img/tshirts/';
		$filename = Str::random(10).'.'.$image->getClientOriginalExtension();
		$image->move($destination, $filename);
		Tag::updateWithNew($input_data['tags']);
		$tshirt = new Tshirt;
		$tshirt->initializeWithData($input_data, $filename);
		$tshirt->save();
		return Redirect::route('admin.index');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($tshirtid)
	{
		$tshirt = Tshirt::find($tshirtid);
		return View::make('tshirt.show')
			->with('tshirt', $tshirt);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($tshirtid)
	{
		$tshirt = Tshirt::find($tshirtid);
		$styles = explode(',', $tshirt->styles);
		$colors = explode(',', $tshirt->colors);
		$sizes = explode(',', $tshirt->sizes);
		$fabrics = explode(',', $tshirt->fabric);
		return View::make('tshirt.edit')
			->with('tshirt',$tshirt)
			->with('styles', $styles)
			->with('colors', $colors)
			->with('sizes', $sizes)
			->with('fabrics', $fabrics);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($tshirtid)
	{
		$tshirt = Tshirt::find($tshirtid);
		$input_data = Input::only('title', 'description', 'tags', 'sizes', 'styles', 'fabrics', 'wash_care', 'price', 'colors');
		$filename = $tshirt->image;
		if(Input::hasFile('image')){
			$image = Input::file('image');
			$destination = base_path().'/public/img/tshirts/';
			$oldfilename = $tshirt->image;
			File::delete($destination.$oldfilename);
			$filename = Str::random(10).'.'.$image->getClientOriginalExtension();
			$image->move($destination, $filename);
		}
		Tag::updateWithNew($input_data['tags']);
		$tshirt->initializeWithData($input_data, $filename);
		$tshirt->save();
		return Redirect::route('admin.index');
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

