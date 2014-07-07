<?php

use Illuminate\Support\MessageBag;

class LoginController extends BaseController {

	public function show(){
		if(Auth::check()) return Redirect::route('home');
		return View::make('home.login')->with('error', 'nothing wrong');
	}

	public function login(){
		if(Auth::attempt(Input::only('username', 'password'))){
			return Redirect::route('home');
		}
		$errors = new MessageBag(['password' => ['Email and/or password invalid.']]);
		return Redirect::back()->withInput()->withErrors($errors);
	}

	public function logout(){
		Auth::logout();
		return Redirect::route('home');
	}

}
?>
