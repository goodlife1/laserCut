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
Auth::routes();


Route::get('/', 'IndexController@index')->name('home');
Route::get('/shop', 'IndexController@shop')->name('shop');
Route::get('shop/filter', 'IndexController@getProducts')->name('shop.filter');

Route::group([
    'prefix' => 'cart',
    'name' => 'cart',
    'where' => [
        'id' => '[0-9]+'
    ]
], function () {
    Route::get('/get', 'CartController@getCart')->name('get');
    Route::post('/add/{product}', 'CartController@addToCart')->name('add')->where(['product' => '[0-9]+']);
    Route::put('/edit/{id}', 'CartController@editCart')->name('edit');
    Route::delete('/unset/{id}', 'CartController@unsetFromCart')->name('unset');
});

Route::group([
    'prefix' => 'order',
    'name' => 'order'
], function () {
    Route::get('/', 'OrderController@index');
    Route::post('/', 'OrderController@createOrder');

});

Route::group([
    'prefix' => 'delivery',
    'name' => 'delivery'
], function () {
    Route::post('/getCities', 'DeliveryController@getCities')->name('getCities');

});

