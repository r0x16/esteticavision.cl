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

Route::get('/', 'HomeController@index');
Route::get('/p/{product}/{slug?}', 'ProductController@index')->name('product');
Route::get('/search', 'SearchController@index');
Route::get('/category/{category}', 'CategoryController@index')->name('category');

// Security Routes
Auth::routes();

// Cart Routes
Route::get('/cart', 'CartController@show');
Route::post('/cart/add', 'CartController@addProduct');
Route::post('/cart/quantity', 'CartController@changeQuantity');
Route::post('/cart/delete', 'CartController@deleteProduct');
Route::post('/cart/checkout', 'QuotationController@quote')->middleware('auth');
Route::get('/quoted', 'QuotationController@quoted');
Route::get('cart/checkout', 'QuotationController@toCart');