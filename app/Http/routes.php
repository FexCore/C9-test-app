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

Route::get('/', 'WelcomeController@index');
Route::get('home', 'HomeController@index');

Route::get('lists/archive', ['as'=>'lists.arhiva','uses'=>'TodolistsController@listArhiva']);
Route::put('lists/archive/{id}',['as'=>'lists.archive','uses'=>'TodolistsController@archive'] );
Route::resource('lists', 'TodolistsController');

Route::get('items/create/{list_id}', ['as'=>'items.create','uses'=>'ItemsController@create']);
Route::put('items/done/{id}',['as'=>'items.done','uses'=>'ItemsController@done'] );
Route::resource('items', 'ItemsController',['except'=>['create']]);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
