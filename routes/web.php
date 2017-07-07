<?php

Route::get('/', 'RecipeController@index')->name('index');
Route::get('/recipe/{recipe}', 'RecipeController@show')->name('show');

Route::get('/create', 'RecipeController@create');
Route::post('/create', 'RecipeController@store')->name('create');
Route::get('/list', 'RecipeController@showOwn')->name('list');
Route::post('/list', 'RecipeController@destroy')->name('list');
Route::get('/edit/{recipe}', 'RecipeController@edit')->name('edit');


Route::get('/login', [
	'uses' => 'SessionsController@create',
	'as' => 'login'
]);

Route::post('login', 'SessionsController@store');
Route::get('logout','SessionsController@destroy')->name('logout');

Route::get('/registration', [
	'uses' => 'RegistrationController@create',
	'as' => 'registration'
]);

Route::post('/registration', [
	'uses' => 'RegistrationController@store',
	'as' => 'registration'
]);


Route::group(['prefix' => 'admin'], function() {

	Route::get('/', [
		'uses' => 'AdminController@adminIndex',
		'as' => 'admin.index'
	]);

	Route::get('/edit/{recipe}', [
		'uses' => 'AdminController@adminEdit',
		'as' => 'admin.edit'
	]);

	Route::post('/edit', [
		'uses' => 'AdminController@adminUpdate',
		'as' => 'admin.update'
	]);

	Route::get('/delete/{id}', [
		'uses' => 'AdminController@adminDelete',
		'as' => 'admin.delete'
	]);
});
