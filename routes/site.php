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
    return view('front.home', ['products'=>$products]);
});

Route::group(['prefix'=>'site'], function () {
    Route::group(['middleware'=>'auth:web','namespace'=>'App\Http\Controllers\User'], function(){
        Route::get('profile','UserController@index')->name('profile');
    });
    Route::group(['middleware'=>'guest:web', 'namespace'=>'App\Http\Controllers\Auth'], function(){
        Route::get('login', 'LoginController@getLogin')->name('login');
        Route::post('login', 'LoginController@login')->name('post.login');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
