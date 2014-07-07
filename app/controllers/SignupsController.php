<?php

class SignupsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Auth::check()) return Redirect::route('home');
		return View::make('home.signup');
	}

	public function register(){
		$input_data = Input::all();
		$validation = Validator::make($input_data, User::$rules);
		if($validation->fails()){
			return Redirect::back()->withInput()->withErrors($validation->messages());
		}
		$user = User::create($input_data);
		$user->password = Hash::make($input_data['password']);
		$user->save();
		Auth::login($user);
		return Redirect::route('home');
	}

	

}
