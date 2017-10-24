<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::group(['middleware' => 'guest'], function() {
	Route::get('/login', 'Auth\LoginController@showLoginForm');
	Route::post('/login', 'Auth\LoginController@login');
	Route::get('/register', 'Auth\RegisterController@showRegistrationForm');
	Route::post('/register', 'Auth\RegisterController@register');
});

Route::group(['middleware' => 'login'], function() {

	Route::get('/logout', 'Auth\LoginController@logout');
	Route::get('/', 'UsersController@home');
	Route::get('/users/{user}', 'UsersController@show')->middleware('can:view,user');
	Route::delete('/users/{user}', 'UsersController@delete')->middleware('can:delete,user');

	Route::get('/banks', 'BanksController@index');
	Route::post('/banks', 'BanksController@store')->middleware('can:create,App\Bank');
	Route::get('/banks/{bank}', 'BanksController@show');
	Route::put('/banks/{bank}', 'BanksController@update')->middleware('can:update,bank');
	Route::delete('/banks/{bank}', 'BanksController@delete')->middleware('can:delete,bank');
	Route::get('/banks/{bank}/edit', 'BanksController@edit')->middleware('can:update,bank');

	Route::get('/accounts', 'AccountsController@index');
	Route::post('/accounts', 'AccountsController@store')->middleware('can:create,App\Account');
	Route::delete('/accounts/{account}', 'AccountsController@delete')->middleware('can:delete,account');
	Route::get('/accounts/{account}', 'AccountsController@show')->middleware('can:view,account');

	Route::post('/accounts/{account}', 'TransactionsController@store')->middleware('can:update,account');
	Route::get('/transactions', 'TransactionsController@index');
	Route::get('/transactions/{transaction}', 'TransactionsController@show')->middleware('can:view,transaction');

	Route::group(['middleware' => 'admin'], function() {

		Route::get('/users', 'UsersController@index');
		Route::put('/users/{user}/privileges', 'UsersController@togglePrivileges');
		Route::get('/admin/transactions', 'TransactionsController@adminIndex');
		Route::get('/admin/accounts', 'AccountsController@adminIndex');

	});

	

});
