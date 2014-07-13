<?php
use Illuminate\Support\MessageBag;

class CartController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$cart = Cart::getCart();
		$tshirts = array();
		if ($cart == false) return Redirect::route('home');
		foreach ($cart->tshirts as $tshirt){
			$tshirts[$tshirt['id']] = Tshirt::find($tshirt['id']);
		}
		return View::make('cart.index')
			->with('cart', $cart)
			->with('tshirts', $tshirts);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$input_data = Input::all();
		$cart = Cart::getCart();
		if($cart == false) $cart = new Cart;
		$cart->addTshirt($input_data['tshirtid'], $input_data['size'], $input_data['color'], $input_data['quantity']);
		$messageBag = new MessageBag;
		$messageBag->add('cart_update', Tshirt::find($input_data['tshirtid'])->title.Lang::get('cart.update.success'));
		if(Auth::guest()){
			$cookie = $cart->saveAsCookie();
			return Redirect::back()
				->withErrors($messageBag)
				->withInput()
				->withCookie($cookie);
		}
		else if(Auth::check()){
			Auth::user()->saveCart($cart);
			return Redirect::back()
				->withErrors($messageBag)
				->withInput();
		}
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


}
