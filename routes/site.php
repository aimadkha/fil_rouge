<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $products = \App\Models\Product::selection()->get();
    return view('front.home', ['products' => $products]);
});

Route::group(['prefix' => 'site', 'middleware'=>'auth:web'], function () {
    Route::group(['middleware' => 'auth', 'namespace' => 'App\Http\Controllers\User'], function () {
        Route::get('profile', 'DashboardController@index')->name('user.profile');
        Route::get('logedout', 'DashboardController@logout')->name('user.logedout');
    });

    ######################### Begin cart Routes ########################

    Route::group(['prefix'=>'cart', 'namespace'=>'App\Http\Controllers\Site'], function(){
        Route::get('/', 'CartController@index')->name('site.cart.index');
        Route::post('/pay', 'CartController@pay')->name('pay');
        Route::get('/approval', 'CartController@approval')->name('approval');
        Route::get('/cancelled', 'CartController@cancelled')->name('cancelled');
        Route::get('add/{id}', 'CartController@addToCart')->name('site.cart.add');
        Route::get('update-cart', 'CartController@update')->name('site.cart.update');
        Route::get('remove-from-cart', 'CartController@remove')->name('site.cart.remove');
//        Route::get('/stripe-payment',[\App\Http\Controllers\StripeController::class, 'handleGet']);
        Route::post('/stripe-payment',[\App\Http\Controllers\StripeController::class, 'handlePost'])->name('stripe.payment');
    });

    ######################### end cart Routes ########################

});

Route::group(['prefix' => 'site', 'middleware' => 'guest:web', 'namespace' => 'App\Http\Controllers\User'], function () {
    Route::get('getLogin', 'LoginController@getLogin')->name('get.user.login');
    Route::post('login', 'LoginController@login')->name('user.login');

});

Route::group(['namespace' => 'App\Http\Controllers', 'middleware'=>'auth:web'], function (){
    Route::get('pay', 'FatoorahController@payOrder');
    Route::get('callback', function (){
        return 'success';
    });
    Route::get('error', function (){
        return 'payement failed';
    });
});

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
