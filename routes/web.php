<?php

Route::get('/home', 'HomeController@index')->name('home');
Route::view('/', 'landing-page');
Route::view('catalog', 'catalog.default')->name('catalog.default');
Route::view('face-result', 'face-result');
Route::view('catalog/selected', 'catalog.selected')->name('catalog.selected');
Route::view('contact-us', 'contact')->name('contactus');
Route::view('cart', 'cart');
Route::view('payment', 'payment');
Route::view('thank-you', 'thanks');
Route::view('fill-address', 'shipping-address');
Route::view('custom/package', 'custom.package');
Route::get('/force/logout', 'Home\MainController@logout');
Route::resource('faq', 'Home\FaqController');
Route::get('payment/finish', 'PaymentController@finish');
Route::get('payment/unfinish', 'PaymentController@unfinish');
Route::get('payment/error', 'PaymentController@error');
Route::get('how-to-order', 'Home\MainController@HowToOrder')->name('how-to-order');

Route::namespace('Home')->middleware('auth')->group(function () {
  Route::get('custom/fragrance', 'MainController@fragrance')->name('main.fragrance');
  Route::post('custom/fragrance', 'MainController@storeFragrance')->name('main.fragrance.store');
  Route::get('custom/sheet', 'MainController@sheet')->name('main.sheet');
  Route::post('custom/sheet', 'MainController@storeSheet')->name('main.sheet.store');
  Route::get('/custom/sheet-fragrance', 'MainController@sheetAndFragrance');
  Route::get('/custom/packages', 'MainController@pricing')->name('main.pricing');
  Route::get('/question', 'MainController@question')->name('main.question');
  Route::get('/address/user', 'CartController@indexShipping')->name('cart.fill.address');
  Route::get('/custom/payment', 'CartController@indexPayment')->name('cart.custom.payment');
  Route::post('question/soal/ajax/{id?}', 'MainController@getSoal')->name('main.question.get.soal');
});

Route::prefix('home')->namespace('Home')->name('home.')->middleware('auth')->group(function () {
  Route::get('/face-result', 'MainController@faceResult')->name('main.face.result');
  Route::resource('cart', 'CartController');
  Route::resource('shipping', 'ShippingController');
  Route::resource('main', 'MainController');
});
Route::prefix('admin')->namespace('Admin')->name('admin.')->group(function () {
  Route::view('invoice', 'admin.invoice')->name('invoice'); //NEW CREATED ON 8/20/2019
  Route::view('recipe', 'admin.recipe')->name('recipe'); //NEW CREATED ON 8/20/2019
  Route::view('ordered', 'admin.ordered'); //NEW CREATED ON 8/20/2019
  Route::get('dashboard', 'AdminController@index')->name('dashboard');
  Route::resource('admin', 'AdminController');
  Route::resource('pricing', 'PricingController');
  Route::resource('cart', 'CartController');
  Route::put('/sheet/update/{id?}', 'SheetController@updateApi')->name('sheet.update.api');
  Route::put('/fragrance/update/{id?}', 'FragranceController@updateApi')->name('fragrance.update.api');
  Route::resource('sheet', 'SheetController');
  Route::resource('fragrance', 'FragranceController');

  Route::post('question/soal/ajax/{id?}', 'QuestionController@getSoal')->name('question.get.soal');
  Route::resource('question', 'QuestionController');
  Route::get('product/trash', 'ProductController@trashed')->name('product.trashed');
  Route::post('product/restored/{id}', 'ProductController@restored')->name('product.restored');
  Route::delete('product/deleted/{product}', 'ProductController@permanentlyDelete')->name('product.permanently_delete.single');
  Route::delete('product/deleted-all', 'ProductController@permanentlyDeleteAll')->name('product.permanently_delete.all');
  Route::resource('product', 'ProductController');
  Route::resource('logic', 'LogicController');
  Route::resource('faq', 'FaqController');
  Route::resource('how-to-order', 'HowToOrderController');
});

Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider')->name('login.provider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('login.callback');
Auth::routes(['verify' => true]);
