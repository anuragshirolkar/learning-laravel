<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	public $timestamps = false;
	
	protected $fillable = ['username', 'password', 'email', 'name', 'phone', 'address', 'town', 'state', 'pincode'];
	
	public static $rules = [
		'username' => 'required|unique:users',
		'password' => 'required',
		'email' => 'email|unique:users',
		'name' => 'required',
		'phone' => 'required',
		'address' => 'required',
		'town' => 'required',
		'state' => 'required',
		'pincode' => 'digits:6'
	];

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');


	/**
	 * Save the cart into the database
	 */
	public function saveCart($cart){
		$this->cart = serialize($cart);
		$this->save();
	}

}
