<?php

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::view('/', 'landing-page');
Route::view('catalog', 'our-catalog');
Route::view('face-result', 'face-result');
