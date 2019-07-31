<?php

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::view('/', 'landing-page');
Route::view('catalog', 'catalog.default');
Route::view('face-result', 'face-result');

Route::prefix('home')->namespace('Home')->name('home.')->group(function () {
    Route::get('/face-result', 'HomeController@faceResult')->name('home.face.result');
    Route::resource('home', 'HomeController');
});
Route::prefix('admin')->namespace('Admin')->name('admin.')->group(function () {
    Route::get('/dashboard', 'AdminController@index')->name('dashboard');
    Route::resource('admin', 'AdminController');
    Route::resource('cart', 'CartController');

    Route::post('/question/soal/ajax/{id?}', 'QuestionController@getSoal')->name('question.get.soal');
    Route::resource('question', 'QuestionController');
    Route::resource('product', 'ProductController');
    Route::resource('logic', 'LogicController');
});
Route::view('catalog/selected', 'catalog.selected');
Route::get('auth', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider')->name('login.provider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('login.callback');
