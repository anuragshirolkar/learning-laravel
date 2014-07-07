<?php

class AdminController extends \BaseController {

	/**
     * Add auth and csrf filters
     */
    public function __construct() {
        $this->beforeFilter('auth');
        $this->beforeFilter('admin');
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Auth::check() && Auth::user()->admin){
			return View::make('admin.index');
		}
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
	 * @return Response
	 */
	public function store()
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

	/**
	 * Add a new Tshirt
	 * 
	 * @return Response
	 */
	public function addTshirt(){
		return View::make('admin.addtshirt');
	}

	/**
	 * Add a new color
	 *
	 * @return Response
	 */
	public function addColor(){
		return View::make('admin.addcolor');
	}

	/**
	 * Edit a color
	 *
	 * @return Response
	 */
	public function editColor($colorid){
		$color = Color::find($colorid);
		return View::make('admin.editcolor')
			->with('color', $color);
	}

	/**
	 * Add a size
	 * 
	 * @return Response
	 */
	public function addSize(){
		return View::make('admin.addsize');
	}

	/**
	 * Edit a size
	 *
	 * @param sizeid
	 * @return Response
	 */
	public function editSize($sizeid){
		$size = Size::find($sizeid);
		return View::make('admin.editsize')
			->with('size', $size);
	}

	/**
	
}
