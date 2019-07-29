<?php

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::view('/', 'landing-page');
Route::view('catalog', 'our-catalog');
Route::view('face-result', 'face-result');
Route::get('auth', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider')->name('login.provider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('login.callback');
