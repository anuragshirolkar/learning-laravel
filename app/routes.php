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

// Admin
Route::group(array('before'=>'admin'), function(){
	Route::get('/admin', array('as'=>'admin.index', 'uses'=>'AdminController@index'));

	// Tshirt
	Route::get('/admin/addtshirt', array('as'=>'admin.addtshirt', 'uses'=>'AdminController@addTshirt'));
	Route::post('/admin/addtshirt', array('as'=>'tshirt.store', 'uses'=>'TshirtsController@store'));
	Route::get('/admin/edittshirt/{tshirtid}', array('as'=>'admin.edittshirt', 'uses'=>'AdminController@editTshirt'));

	// Book
	Route::get('/admin/addbook', array('as'=>'admin.addbook', 'uses'=>'AdminController@addBook'));
	Route::get('/admin/editbook/{bookid}', array('as'=>'admin.editbook', 'uses'=>'AdminController@editBook'));


	// Data
	Route::get('/data/tagslist', array('as'=>'data.tagslist', 'uses'=>'TagsController@listTags'));
	Route::get('/data/sizes', array('as'=>'data.sizes', 'uses'=>'SizesController@sizes'));

	// Color
	Route::get('/admin/colors', array('as'=>'colors.show', 'uses'=>'ColorsController@index'));
	Route::get('/admin/addcolor', array('as'=>'admin.addcolor', 'uses'=>'AdminController@addcolor'));
	Route::post('/admin/addcolor', array('as'=>'color.store', 'uses'=>'ColorsController@store'));
	Route::get('/admin/editcolor/{colorid}', array('as'=>'admin.editcolor', 'uses'=>'AdminController@editColor'));
	Route::post('/admin/editcolor/{colorid}', array('as'=>'color.update', 'uses'=>'ColorsController@update'));

	// Size
	Route::get('/admin/sizes', array('as'=>'sizes.show', 'uses'=>'SizesController@index'));
	Route::get('/admin/addsize', array('as'=>'admin.addsize', 'uses'=>'AdminController@addsize'));
	Route::post('/admin/addsize', array('as'=>'size.store', 'uses'=>'SizesController@store'));
	Route::get('/admin/editsize/{sizeid}', array('as'=>'admin.editsize', 'uses'=>'AdminController@editSize'));
	Route::post('/admin/editsize/{sizeid}', array('as'=>'size.update', 'uses'=>'SizesController@update'));

	// styles
	Route::get('/admin/styles', array('as'=>'styles.show', 'uses'=>'StylesController@index'));
	Route::get('/admin/addstyle', array('as'=>'admin.addstyle', 'uses'=>'AdminController@addstyle'));
	Route::post('/admin/addstyle', array('as'=>'style.store', 'uses'=>'StyleController@store'));
	Route::get('/admin/editstyle/{styleid}', array('as'=>'admin.editstyle', 'uses'=>'AdminController@editStyle'));
	Route::post('/admin/editstyle/{styleid}', array('as'=>'style.update', 'uses'=>'StyleController@update'));
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
