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

Route::get('/register', function(){
	return View::make('register');
} );

Route::get('/forgotpass', function(){
	return View::make('forgotpass');
});