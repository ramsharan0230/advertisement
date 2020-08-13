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

Route::get('/', 'HomeController@home')->name('home');

Auth::routes();

Route::group(['prefix' => '/admin', 'middleware' => 'Admin'], function () {
    Route::get('/', 'AdminController@index')->name('admin');
    Route::get('/create-vendor', 'VendorController@createVendor')->name('create-vendor');
    Route::post('/create-vendor', 'VendorController@storeVendor')->name('create-vendor');
    Route::get('/vendor-delete/{id}', 'VendorController@deleteVendor')->name('vendor-delete');
});

Route::group(['prefix' => '/vendor', 'middleware' => 'Vendor'], function()
{
    Route::get('/', 'VendorController@index')->name('vendor');
    Route::get('/create-advertisement', 'AdvertisementController@create')->name('create-advertisement');
    Route::post('/create-advertisement', 'AdvertisementController@store')->name('create-advertisement');
    Route::get('/advertisement', 'AdvertisementController@index')->name('advertisement');
});

Route::get('/home', 'HomeController@home')->name('home');

Route::get('/signout', function(){
    // Auth::logout();
    Session::flush();
    return redirect()->route('login');
});