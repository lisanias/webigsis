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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::get('/login', 'Auth\LoginController@login')->name('login');


Route::group(['middleware' => 'auth'], function() {
	
	Route::get('/profile', 'Auth\UserController@profile')->name('profile');
	Route::post('/profile/store', 'Auth\UserController@store')->name('profile.store');
	Route::get('/user/{id}/destroyer', 'Auth\UserController@destroy')->name('user.destroyer');
	Route::resource('user', 'Auth\UserController');

	Route::get('/config', function(){
		return 'config';
	})->name('config');

	Route::get('/help', function(){
		return 'Ajuda';
	})->name('help');

	Route::get('/home', 'HomeController@index')->name('home');

});

Auth::routes();

// discupulos
Route::group(['namespace' => 'discipulo', 'middleware' => 'auth'], function() {
	Route::get('/discipulo','DiscipuloController@index')->name('discipulo');
	Route::get('/discipulo/add','DiscipuloController@add')->name('discipulo.add');
	Route::post('/discipulo/store','DiscipuloController@store')->name('discipulo.store');
	Route::post('/discipulo/storeAddress','EnderecoController@store')->name('discipulo.storeAddress');
	//Route::get('/discipulo/{id}/add-2/','DiscipuloController@add2')->name('discipulo.add-2');
});


