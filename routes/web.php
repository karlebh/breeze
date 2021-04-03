<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {

	Route::get('/', function () {
		    return view('dashboard');
		})->name('dashboard');

	Route::get('/dashboard', function () {
	    return view('dashboard');
	});

});

Route::group(['middleware' => 'guest'], function () {
	Route::get('auth/{provider}', 'AuthSignUpController@redirectToProvider')
	->where('provider', '[a-z]+');
	Route::get('auth/{provider}/callback', 'AuthSignUpController@handleProviderCallback')
	->where('provider', '[a-z]+');
});


require __DIR__.'/auth.php';
