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

});

Route::group(['prefix' => 'site', 'middleware' => 'guest:web', 'namespace' => 'App\Http\Controllers\User'], function () {
    Route::get('getLogin', 'LoginController@getLogin')->name('get.user.login');
    Route::post('login', 'LoginController@login')->name('user.login');

});

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
