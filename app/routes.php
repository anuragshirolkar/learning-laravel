<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Homepage
Route::get('/', array('as'=>'home', 'uses'=>'HomeController@home'));

Route::get('/users', array('as'=>'user.all', 'uses'=>'UsersController@index'));
Route::get('/users/{id}', array('as'=>'user.show', 'uses'=>'UsersController@show'));
Route::get('/signup', array('as'=>'Signup', 'uses'=>'SignupsController@index'));
Route::post('/register', array('as'=>'signup.register', 'uses'=>'SignupsController@register'));
Route::get('/login', array('as'=>'login.show', 'uses'=>'LoginController@show'));
Route::post('/login', array('as'=>'login.auth', 'uses'=>'LoginController@login'));
Route::get('/logout', array('as'=>'logout', 'uses'=>'LoginController@logout'));

// Shop
Route::get('/shop', array('as'=>'shop', 'uses'=>'TshirtsController@index'));
Route::get('/product/{tshirtid}', array('as'=>'tshirt.show', 'uses'=>'TshirtsController@show'));
Route::post('/create-cart', array('as'=>'cart.create', 'uses'=>'CartController@create'));

// Cart
Route::get('/cart', array('as'=>'cart.index', 'uses'=>'CartController@index'));

// Admin
Route::group(array('before'=>'admin'), function(){
	Route::get('/admin', array('as'=>'admin.index', 'uses'=>'AdminController@index'));

	// Tshirt
	Route::get('/admin/addtshirt', array('as'=>'tshirt.create', 'uses'=>'TshirtsController@create'));
	Route::post('/admin/addtshirt', array('as'=>'tshirt.store', 'uses'=>'TshirtsController@store'));
	Route::get('/admin/edittshirt/{tshirtid}', array('as'=>'tshirt.edit', 'uses'=>'TshirtsController@edit'));
	Route::post('/admin/edittshirt/{tshirtid}', array('as'=>'tshirt.update', 'uses'=>'TshirtsController@update'));

	// Book
	Route::get('/admin/addbook', array('as'=>'admin.addbook', 'uses'=>'AdminController@addBook'));
	Route::get('/admin/editbook/{bookid}', array('as'=>'admin.editbook', 'uses'=>'AdminController@editBook'));


	// Data
	Route::get('/data/tagslist', array('as'=>'data.tagslist', 'uses'=>'TagsController@listTags'));
	Route::get('/data/sizes', array('as'=>'data.sizes', 'uses'=>'SizesController@sizes'));

	// Color
	Route::get('/admin/colors', array('as'=>'color.index', 'uses'=>'ColorsController@index'));
	Route::get('/admin/addcolor', array('as'=>'color.create', 'uses'=>'ColorsController@create'));
	Route::post('/admin/addcolor', array('as'=>'color.store', 'uses'=>'ColorsController@store'));
	Route::get('/admin/editcolor/{colorid}', array('as'=>'color.edit', 'uses'=>'ColorsController@edit'));
	Route::post('/admin/editcolor/{colorid}', array('as'=>'color.update', 'uses'=>'ColorsController@update'));

	// Size
	Route::get('/admin/sizes', array('as'=>'size.index', 'uses'=>'SizesController@index'));
	Route::get('/admin/addsize', array('as'=>'size.create', 'uses'=>'SizesController@create'));
	Route::post('/admin/addsize', array('as'=>'size.store', 'uses'=>'SizesController@store'));
	Route::get('/admin/editsize/{sizeid}', array('as'=>'size.edit', 'uses'=>'SizesController@edit'));
	Route::post('/admin/editsize/{sizeid}', array('as'=>'size.update', 'uses'=>'SizesController@update'));

	// styles
	Route::get('/admin/styles', array('as'=>'style.index', 'uses'=>'StylesController@index'));
	Route::get('/admin/addstyle', array('as'=>'style.create', 'uses'=>'StylesController@create'));
	Route::post('/admin/addstyle', array('as'=>'style.store', 'uses'=>'StylesController@store'));
	Route::get('/admin/editstyle/{styleid}', array('as'=>'style.edit', 'uses'=>'StylesController@edit'));
	Route::post('/admin/editstyle/{styleid}', array('as'=>'style.update', 'uses'=>'StylesController@update'));

	// Fabrics
	Route::get('/admin/fabrics', array('as'=>'fabric.index', 'uses'=>'FabricsController@index'));
	Route::get('/admin/addfabric', array('as'=>'fabric.create', 'uses'=>'FabricsController@create'));
	Route::post('/admin/addfabric', array('as'=>'fabric.store', 'uses'=>'FabricsController@store'));
	Route::get('/admin/editfabric/{fabricid}', array('as'=>'fabric.edit', 'uses'=>'FabricsController@edit'));
	Route::post('/admin/editfabric/{fabricid}', array('as'=>'fabric.update', 'uses'=>'FabricsController@update'));

});

// test
//Route::get('/test', function(){
	//echo Form::open(array('url'=>'test', 'files'=>true));
	//echo Form::file('image');
	//echo Form::submit('click me');
	//echo Form::close();
//});

//Route::post('/test', function(){
	//return Input::file('image')->getClientOriginalName();
//});


/*
App::make('Controller')->method($param)
*/

