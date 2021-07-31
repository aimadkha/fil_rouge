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

    Route::group(['prefix'=>'vendors'], function(){
        Route::get('/', 'VendorController@index')->name('admin.vendors');
        Route::get('create', 'VendorController@create')->name('admin.vendors.create');
        Route::post('store', 'VendorController@store')->name('admin.vendors.store');
        Route::get('edit/{id}', 'VendorController@edit')->name('admin.vendors.edit');
        Route::post('update/{id}', 'VendorController@update')->name('admin.vendors.update');
        Route::get('delete/{id}', 'VendorController@destroy')->name('admin.vendors.delete');
    });

    ######################### end vendors Routes ########################

    ######################### Begin Sub Categoris Routes ########################

    Route::group(['prefix'=>'sub_categories'], function(){
        Route::get('/', 'SubCategoriesController@index')->name('admin.subcategories');
        Route::get('create', 'SubCategoriesController@create')->name('admin.subcategories.create');
        Route::post('store', 'SubCategoriesController@store')->name('admin.subcategories.stor');
        Route::get('edit/{id}', 'SubCategoriesController@edit')->name('admin.subcategories.edit');
        Route::post('update/{id}', 'SubCategoriesController@update')->name('admin.subcategories.update');
        Route::get('delete/{id}', 'SubCategoriesController@destroy')->name('admin.subcategories.delete');

    });

    ######################### end Sub Categoris Routes ########################
});



Route::group(['prefix'=>'admin','namespace'=>'App\Http\Controllers\admin','middleware'=>'guest:admin'], function (){
    Route::get('login', 'LoginController@getLogin')->name('get.admin.login');
    Route::post('login', 'LoginController@login')->name('admin.login');
});


