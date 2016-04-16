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

Route::get('/', function()
{
	return View::make('basic.home');
});


Route::post('/enter', "UserController@enter");

Route::get('/login', function(){
	return View::make('basic.login');
});

Route::post('/newpass','UserController@newpass');

Route::get('/member', function(){
	return View::make('basic.member');
});

Route::post('/forgotpass', function(){
	return View::make('basic.forgotpass');
});

Route::post('/result', 'ResultController@yes');

Route::get('/signup', function(){
	return View::make('basic.register');
});