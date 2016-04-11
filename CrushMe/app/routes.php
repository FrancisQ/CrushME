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

Route::resource('Home','HomeController');

Route::get('/login', function(){
	return View::make('Basic.login');
});

Route::get('/signup', function(){
	return View::make('Basic.register');
});