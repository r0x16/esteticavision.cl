<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    
    // Rutas asociadas al módulo de elementos multimedia.
    Route::post('/media/image', 'Api\Multimedia\ImageUploadController@imageStore');
    Route::post('/media/youtube', 'Api\Multimedia\YoutubeElementController@youtubeStore');
    Route::get('/media/chooser/list', 'Api\Multimedia\MediaChooserController@list');

    // Rutas asociadas al módulo de categorías.
    Route::resource('categories', 'Api\Category\CategoryController');
    Route::get('categories/{category}/webpage', 'Api\Category\CategoryWebpageController@show');
    Route::post('categories/{category}/webpage', 'Api\Category\CategoryWebpageController@store');
    Route::put('categories/{category}/webpage', 'Api\Category\CategoryWebpageController@update');

    // Rutas asociadas al módulo de productos
    Route::resource('products', 'Api\Product\ProductController');
    Route::get('products/{product}/media', 'Api\Product\ProductMediaController@list');
    Route::post('products/{product}/media', 'Api\Product\ProductMediaController@store');
    Route::resource('product/details', 'Api\Product\ProductDetailController');
    Route::resource('product/features', 'Api\Product\ProductFeatureController');
});

Route::get('/media/list', 'Api\Multimedia\ImageUploadController@listImages');