<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	public $timestamps = false;
	
	protected $fillable = ['username', 'password', 'email', 'name', 'phone', 'address', 'town', 'state', 'pincode'];
	
	public static $rules = [
		'username' => 'required',
		'password' => 'required',
		'email' => 'email',
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

}
