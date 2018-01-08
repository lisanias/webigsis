<?php

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/login', 'Auth\LoginController@login')->name('login');


Route::group(['middleware' => 'auth'], function() {
	
	Route::get('/profile', 'Auth\UserController@profile')->name('profile');
	Route::post('/profile/store', 'Auth\UserController@store')->name('profile.store');
	Route::get('/user/{id}/destroyer', 'Auth\UserController@destroy')->name('user.destroyer');
	Route::resource('user', 'Auth\UserController');
	Route::get('/home', 'HomeController@index')->name('home');

	Route::get('/config', function(){ return 'config'; })->name('config');
	Route::get('/help', function(){ return 'Ajuda'; })->name('help');
});


// discupulos
Route::group([
		'namespace' 	=> 'Discipulo', 
		'middleware' 	=> 'auth',
	    //'prefix'		=> 'discipulo',
	], function() {

	//Route::get('telefone/{discipulo_id}/create', 'TelefoneController@create'); // opicional - não esta sendo usado mais
	
	Route::post('search', 'DiscipuloController@search')->name('procura');
	Route::resource('discipulo', 'DiscipuloController');

	Route::resource('telefone', 'TelefoneController');
});

// CELULAS
Route::group([
		'namespace' 	=> 'Celula', 
		'middleware' 	=> 'auth',
	], function() {

	Route::resource('celula', 'CelulaController');

});


Auth::routes();
