<?php

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

// Homepage route
Route::get('/', function () {
    return view('welcome');
});

// Auth routes
Auth::routes();

// Admin routes group
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    // Dashboard route
    Route::get('/', 'DashboardController@index')->name('dashboard');
    
    // Products route
    Route::resource('products', 'ProductsController');

    // Categories route
    Route::resource('categories','CategoriesController');

    // Orders route
    Route::resource('orders','OrdersController');

    // Store route
    Route::resource('stores', 'StoresController');
    Route::get('stores/select/{store}', 'StoresController@select')->name('stores.select');
});
