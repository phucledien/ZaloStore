<?php

use App\Events\OrderStatusUpdated;

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

Route::get('api/messages', 'MessagesController@apiIndex')->name('api.messages.index');
Route::get('api/messages/uid/{uid}', 'MessagesController@apiShow')->name('api.messages.show');

// Auth routes
Auth::routes();

// Callback Get Message from ZALO
Route::get('zalo', 'MessagesController@callback')->name('zalo.callback');

// Admin routes group
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    // Dashboard route
    Route::get('/', 'DashboardController@index')->name('dashboard');
    
    // Broadcast route
    Route::get('broadcast', 'MessagesController@broadcastCreate')->name('messages.broadcast.create');
    Route::post('broadcast', 'MessagesController@broadcastStore')->name('messages.broadcast.store');
    
    // Categories route
    Route::resource('categories','CategoriesController');


    // Message route
    Route::get('messages', 'MessagesController@index')->name('messages.index');
    
    Route::post('messages', 'MessagesController@store')->name('messages.store');

    Route::get('messages/uid/{uid}', 'MessagesController@show')->name('messages.show');

    // Orders route
    Route::resource('orders','OrdersController');

    // Products route
    Route::resource('products', 'ProductsController');

    // Store route
    Route::resource('stores', 'StoresController');
    Route::get('stores/select/{store}', 'StoresController@select')->name('stores.select');
});
