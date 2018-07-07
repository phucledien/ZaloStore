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
    
    // Categories route
    Route::resource('categories','CategoriesController');

    // Message route
    Route::get('messages', 'MessagesController@broadcastCreate')->name('messages.broadcast.create');
    Route::post('messages', 'MessagesController@broadcastStore')->name('messages.broadcast.store');

    // Orders route
    Route::resource('orders','OrdersController');

    // Products route
    Route::resource('products', 'ProductsController');

    // Store route
    Route::resource('stores', 'StoresController');
    Route::get('stores/select/{store}', 'StoresController@select')->name('stores.select');
});
