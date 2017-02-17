<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/{id?}', 'UserController@index');

Route::get('/user/add', 'UserController@insert');

Route::post('/user/add2', 'UserController@insert');

Route::get('/user/edit/{id}', 'UserController@edit');

Route::post('/user/edit2/{id}', 'UserController@edit');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
