<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => 'guest'], function () {
	Route::get('auth/{provider}', 'AuthSignUpController@redirectToProvider')
	->where('provider', '[a-z]+');
	Route::get('auth/{provider}/callback', 'AuthSignUpController@handleProviderCallback')
	->where('provider', '[a-z]+');
});


require __DIR__.'/auth.php';
