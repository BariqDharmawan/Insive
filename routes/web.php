<?php

Route::get('/home', 'HomeController@index')->name('home');
Route::view('/', 'landing-page');
Route::view('catalog', 'catalog.default')->name('catalog.default');
Route::view('face-result', 'face-result');
Route::view('catalog/selected', 'catalog.selected')->name('catalog.selected');
Route::view('contact-us', 'contact')->name('contactus');
Route::view('cart', 'cart');
Route::view('thank-you', 'thanks');
Route::view('fill-address', 'shipping-address');
Route::view('custom/package', 'custom.package');
Route::get('/force/logout', 'Home\MainController@logout');

Route::namespace('Home')->middleware('auth')->group(function () {
  Route::get('custom/fragrance', 'MainController@fragrance')->name('main.fragrance');
  Route::post('custom/fragrance', 'MainController@storeFragrance')->name('main.fragrance.store');
  Route::get('custom/sheet', 'MainController@sheet')->name('main.sheet');
  Route::post('custom/sheet', 'MainController@storeSheet')->name('main.sheet.store');
  Route::get('/custom/sheet-fragrance', 'MainController@sheetAndFragrance');
  Route::get('/custom/packages', 'MainController@pricing')->name('main.pricing');
  Route::get('/question', 'MainController@question')->name('main.question');
  Route::get('/address/user', 'CartController@indexShipping')->name('cart.fill.address');
  Route::post('question/soal/ajax/{id?}', 'MainController@getSoal')->name('main.question.get.soal');
});

Route::prefix('home')->namespace('Home')->name('home.')->middleware('auth')->group(function () {
  Route::get('/face-result', 'MainController@faceResult')->name('main.face.result');
  Route::resource('cart', 'CartController');
  Route::resource('main', 'MainController');
});
Route::prefix('admin')->namespace('Admin')->name('admin.')->group(function () {
  Route::get('dashboard', 'AdminController@index')->name('dashboard');
  Route::resource('admin', 'AdminController');
  Route::resource('cart', 'CartController');

  Route::post('question/soal/ajax/{id?}', 'QuestionController@getSoal')->name('question.get.soal');
  Route::resource('question', 'QuestionController');
  Route::resource('product', 'ProductController');
  Route::resource('logic', 'LogicController');
});

Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider')->name('login.provider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('login.callback');
Auth::routes(['verify' => true]);
