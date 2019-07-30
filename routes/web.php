<?php

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::view('/', 'landing-page');
Route::view('catalog', 'our-catalog');
Route::view('face-result', 'face-result');

Route::prefix('admin')->namespace('Admin')->name('admin.')->group(function () {
    Route::get('/dashboard', 'AdminController@index')->name('dashboard');
    Route::resource('admin', 'AdminController');
    Route::resource('cart', 'CartController');

    Route::get('/question/soal/ajax/{id?}', 'QuestionController@getSoal')->name('question.get.soal');
    Route::resource('question', 'QuestionController');
    Route::resource('product', 'ProductController');
    Route::resource('logic', 'LogicController');
});