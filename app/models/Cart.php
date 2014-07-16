<?php

class Cart{
	public $tshirtsQuant;
	public $tshirts;
	public $booksQuant;
	public $books;

	/**
	 * Constructor
	 */
	public function __construct(){
		$this->tshirtsQuant = 0;
		$this->booksQuant = 0;
		$this->tshirts = array();
		$this->books = array();
	}

	/**
	 * Gets current cart from cookie or database
	 */
	public static function getCart(){
		$cart = false;
		if(Auth::guest()){
			if(Cookie::has('cart')){
				$cart = unserialize(Cookie::get('cart'));
			}
		}
		else if(Auth::check()){
			$cartStr = Auth::user()->cart;
			if($cartStr != '') $cart = unserialize(Auth::user()->cart);
		}
		return $cart;
	}


	/**
	 * Check if exists
	 */
	public function checkExists($id, $size, $color){
		foreach($this->tshirts as $key => $tshirt){
			if($id == $tshirt['id'] && $size == $tshirt['size'] && $color == $tshirt['color']) return $key;
		}
		return -1;
	}

	/**
	 * Adds a tshirt to the cart
	 */
	public function addTshirt($id, $size, $color, $quantity){
		$exists = $this->checkExists($id, $size, $color);
		if($exists != -1){
			$this->tshirts[$exists]['quantity'] += $quantity;
		}
		else{
			array_push($this->tshirts, array('id'=>$id, 'size'=>$size, 'color'=>$color, 'quantity'=>$quantity));
			$this->tshirtsQuant += $quantity;
		}
	}

	/**
	 * saves the current cart as a cookie
	 */
	public function saveAsCookie(){
		$cookie = Cookie::forever('cart', serialize($this));
		return $cookie;
	}
}
