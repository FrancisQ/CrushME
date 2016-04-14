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

Route::resource('home','HomeController');
Route::resource('user','UserController');

Route::post('/FINE', "UserController@enter");

Route::get('/login', function(){
	return View::make('basic.login');
});

Route::get('/signup', function(){
	return View::make('basic.register');
});