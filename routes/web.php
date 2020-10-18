<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('receipt', function () {
  $cart = App\Models\Cart::first();
  return new App\Mail\ReceiptPayment($cart);
});

Route::get('/home', 'HomeController@index')->name('home');
Route::view('/', 'landing');
Route::post('finish', 'MidtransController@index')->name('transaction.finish');
Route::post('submit/payment', 'MidtransController@submitPayment')->name('submit.pay-custom');
Route::post('submit/payment/catalog', 'MidtransController@submitPaymentCatalog')->name('submit.pay-catalog');
Route::post('notification/handler', 'MidtransController@notificationHandler')->name('notification.handler');

Auth::routes(['verify' => true]);

Route::namespace('Auth')->name('login.')->prefix('login')->group(function () {
  Route::get('{provider}', 'LoginController@redirectToProvider')->name('provider');
  Route::get('{provider}/callback', 'LoginController@handleProviderCallback')->name('callback');
});

Route::namespace('Home')->group(function () {
  Route::get('contact-us', 'MainController@contact')->name('contact-us');
  Route::post('contact-us/store', 'MainController@ContactStore')->name('contact-us.store');

  Route::get('how-to-order', 'MainController@howToOrder')->name('how-to-order');
  Route::resource('faq', 'FaqController');
});

Route::prefix('payment')->middleware(['auth', 'verified'])->name('payment.')->group(function () {
  Route::get('finish', 'PaymentController@finish')->name('finish');
  Route::get('unfinish', 'PaymentController@unfinish')->name('unfinish');
  Route::get('error', 'PaymentController@error')->name('error');
});

Route::namespace('Home')->middleware(['auth', 'verified'])->group(function () {
  Route::get('catalog', 'CatalogController@index')->name('catalog.default');
  Route::resource('profile', 'ProfileController');
  Route::get('force/logout', 'MainController@logout');

  Route::prefix('custom')->name('main.')->group(function () {
    Route::get('sheet', 'MainController@sheet')->name('sheet');
    Route::post('sheet', 'MainController@storeSheet')->name('sheet.store');
    Route::get('fragrance', 'MainController@fragrance')->name('fragrance');
    Route::post('fragrance', 'MainController@storeFragrance')->name('fragrance.store');
    Route::get('packages', 'MainController@pricing')->name('pricing');
  });

  Route::post('catalog/store', 'CatalogController@store')->name('home.catalog.store');
  // Route::get('custom/sheet-fragrance', 'MainController@sheetAndFragrance');
  Route::get('question', 'MainController@question')->name('main.question');
  Route::get('address/user', 'CartController@indexShipping')->name('cart.fill.address');
  Route::get('address/user/catalog', 'CartController@indexShippingCatalog')->name('cart.fill.address.catalog');
  Route::get('cart/payment', 'CartController@indexPayment')->name('cart.custom.payment');

  Route::permanentRedirect('finish/payment', '/');

  Route::post('custom/payment/store', 'CartController@postPayment')->name('cart.custom.payment.store');
  Route::get('catalog/payment', 'CartController@indexCatalogPayment')->name('cart.catalog.payment');
  Route::post('question/soal/ajax/{id?}/{status?}', 'MainController@getSoal')->name('main.question.get.soal');
});

Route::prefix('home')->namespace('Home')->name('home.')->middleware(['auth', 'verified'])->group(function () {
  Route::get('/face-result', 'MainController@faceResult')->name('main.face.result');
  Route::post('shipping/store/catalog', 'ShippingController@storeCatalog')->name('shipping.store.catalog');
  Route::resources([
    'cart' => 'CartController',
    'shipping' => 'ShippingController',
    'main' => 'MainController'
  ]);
});

Route::prefix('admin')->namespace('Admin')->middleware(['auth', 'role.admin'])->name('admin.')->group(function () {
  Route::view('invoice', 'admin.invoice')->name('invoice');
  Route::get('invoice/all', 'AdminController@indexInvoice')->name('invoice.all');
  Route::view('recipe', 'admin.recipe')->name('recipe');
  Route::get('recipe/all', 'AdminController@indexRecipe')->name('recipe.all');
  Route::get('single-recipe/{single}', 'AdminController@singleRecipe')->name('single-recipe');
  Route::get('invoice-recipe/search', 'AdminController@findInvoiceRecipe')->name('search.invoice-recipe');
  Route::get('dashboard', 'AdminController@index')->name('dashboard');
  Route::get('order/all', 'AdminController@indexOrder')->name('order.all');
  Route::get('order/print/invoice/{id}', 'AdminController@getInvoice')->name('order.print.invoice');
  Route::post('order/input/tracking/{id?}', 'AdminController@updateTrackingOrder')->name('order.tracking.update');
  Route::put('/fragrance/update/{id?}', 'FragranceController@updateApi')->name('fragrance.update.api');
  Route::put('/sheet/update/{id?}', 'SheetController@updateApi')->name('sheet.update.api');
  Route::post('question/soal/ajax/{id?}', 'QuestionController@getSoal')->name('question.get.soal');
  Route::get('product/trash', 'ProductController@trashed')->name('product.trashed');
  Route::post('product/restored/{id}', 'ProductController@restored')->name('product.restored');
  Route::delete('product/deleted/{product}', 'ProductController@permanentlyDelete')->name('product.permanently_delete.single');
  Route::delete('product/deleted-all', 'ProductController@permanentlyDeleteAll')->name('product.permanently_delete.all');
  Route::prefix('about-us')->name('about-us.')->group(function () {
    Route::post('update-contact', 'AboutContactController')->name('update');
  });
  Route::prefix('setting')->name('setting.')->group(function () {
    Route::get('/', 'AdminController@setting')->name('index');
    Route::put('update', 'AdminController@updateAccount')->name('update');
  });

  Route::resource('product', 'ProductController')->except(['create', 'edit', 'show']);
  Route::resources([
    'pesan-dari-customer' => 'ContactusController',
    'admin' => 'AdminController',
    'pricing' => 'PricingController',
    'cart' => 'CartController',
    'fragrance' => 'FragranceController',
    'sheet' => 'SheetController',
    'question' => 'QuestionController',
    'logic' => 'LogicController',
    'faq' => 'FaqController',
    'how-to-order' => 'HowToOrderController'
  ]);
});
