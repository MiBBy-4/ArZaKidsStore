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
Route::group(['middleware' => 'guest', 'namespace' => 'main'], function()
{
    Route::get('/vk/auth', 'SocialController@index')->name('vk.auth');
    Route::get('/vk/auth/callback', 'SocialController@callback');
});

Route::group(['namespace'=>'main'], function()
{
    Route::get('/', 'MainController@index')->name("main.index");
    Route::post('/cart/store', 'CartController@store')->name("cart.store");
    Route::get('/cart', 'CartController@index')->name("cart.index");
    Route::delete('/cart/destroy', 'CartController@destroy')->name("cart.destroy");
    Route::post('/bookmark/store', 'BookmarkController@store')->name("bookmark.store");
    Route::get('/bookmark', 'BookmarkController@index')->name('bookmark.index');
    Route::delete('/bookmark/destroy', 'BookmarkController@destroy')->name('bookmark.destroy');
    Route::post('/cart/checkout', 'OrderController@store')->name('order.store');
    Route::get('/order/show', 'OrderController@index')->name('order.index');
});


Auth::routes();

Route::group(['namespace' => 'admin', 'middleware' => 'admin'], function ()
{
    Route::get('/admin', 'ProductController@index')->name('admin.products.index');
    Route::get('/admin/product/create', 'ProductController@create')->name('admin.products.create');
    Route::post('/admin/product/store', 'ProductController@store')->name('admin.products.store');
    Route::get('/admin/product/{product}/edit', 'ProductController@edit')->name('admin.products.edit');
    Route::post('/admin/product/{product}/edit/update', 'ProductController@update')->name('admin.products.update');
    Route::delete('/admin/product/{productId}/destroy', 'ProductController@destroy')->name('admin.products.destroy');
    Route::get('/admin/orders', 'OrderController@index')->name('admin.orders.index');
    Route::delete('/admin/orders/orderconfirm', 'OrderController@orderConfirm')->name('admin.orders.confirm');
});

