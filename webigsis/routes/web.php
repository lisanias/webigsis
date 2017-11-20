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
Auth::routes();

Route::get('/teste', function() {
	return "teste";
});

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/login', 'Auth\LoginController@login')->name('login');



/*Route::group(['middleware' => 'auth'], function() {*/
	
	Route::get('/profile/', 'Auth\UserController@profile')->name('profile');
	Route::get('/profile/edit', 'Auth\UserController@edit')->name('profile.edit');

	Route::get('/config', function(){
		return 'config';
	})->name('config');

	Route::get('/help', function(){
		return 'Ajuda';
	})->name('help');


	

	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/users/list', 'Auth\UserController@list')->name('users.list');
/*});*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
