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
Route::group(['prefix'=>'admin','namespace'=>'App\Http\Controllers\admin','middleware'=>'auth:admin'], function () {
    Route::get('/','DashboardController@index')->name('admin.dashboard');


    ######################### Begin Main Categoris Routes ########################
    Route::group(['prefix'=>'main_categories'], function(){
        Route::get('/', 'MainCategoriesController@index')->name('admin.maincategories');
        Route::get('create', 'MainCategoriesController@create')->name('admin.maincategories.create');
        Route::post('store', 'MainCategoriesController@store')->name('admin.maincategories.stor');
        Route::get('edit/{id}', 'MainCategoriesController@edit')->name('admin.maincategories.edit');
        Route::post('update/{id}', 'MainCategoriesController@update')->name('admin.maincategories.update');
        Route::get('delete/{id}', 'MainCategoriesController@destroy')->name('admin.maincategories.delete');

    });

    ######################### end Main Categoris Routes ########################

    ######################### Begin Vendors Routes ########################
    Route::group(['prefix'=>'vendor'], function(){
        Route::get('/', 'MainCategoriesController@index')->name('admin.maincategories');
        Route::get('create', 'MainCategoriesController@create')->name('admin.maincategories.create');
        Route::post('store', 'MainCategoriesController@store')->name('admin.maincategories.stor');
        Route::get('edit/{id}', 'MainCategoriesController@edit')->name('admin.maincategories.edit');
        Route::post('update/{id}', 'MainCategoriesController@update')->name('admin.maincategories.update');
        Route::get('delete/{id}', 'MainCategoriesController@destroy')->name('admin.maincategories.delete');

    });

    ######################### end vendors Routes ########################
});



Route::group(['prefix'=>'admin','namespace'=>'App\Http\Controllers\admin','middleware'=>'guest:admin'], function (){
    Route::get('login', 'LoginController@getLogin')->name('get.admin.login');
    Route::post('login', 'LoginController@login')->name('admin.login');
});


