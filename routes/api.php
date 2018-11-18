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
    Route::delete('/media/{media}', 'Api\Multimedia\MultimediaController@destroy');

    // Rutas asociadas al módulo de categorías.
    Route::resource('categories', 'Api\Category\CategoryController');
    Route::get('categories/{category}/webpage', 'Api\Category\CategoryWebpageController@show');
    Route::post('categories/{category}/webpage', 'Api\Category\CategoryWebpageController@store');
    Route::put('categories/{category}/webpage', 'Api\Category\CategoryWebpageController@update');
    Route::get('categories/{category}/removable', 'Api\Category\CategoryController@removable');

    // Rutas asociadas al módulo de productos
    Route::resource('products', 'Api\Product\ProductController');
    Route::get('products/{product}/media', 'Api\Product\ProductMediaController@list');
    Route::post('products/{product}/media', 'Api\Product\ProductMediaController@store');
    Route::resource('products/tags', 'Api\Product\ProductTagsController');
    Route::resource('product/details', 'Api\Product\ProductDetailController');
    Route::resource('product/features', 'Api\Product\ProductFeatureController');
    Route::put('product/category', 'Api\Product\ProductController@updateCategory');

    // Rutas asociadas a la creación de marcas
    Route::resource('brands', 'Api\BrandController');

    // Rutas asociadas al carrusel de imágenes de la página principal
    Route::resource('carousel', 'Api\CarouselItemController');

    // Rutas asociadas a las configuraciones del sitio
    Route::get('setting/get', 'Api\SettingsController@getSingle');
    Route::post('setting/set', 'Api\SettingsController@setSingle');
    Route::delete('setting/forget', 'Api\SettingsController@forget');
});

Route::get('/media/list', 'Api\Multimedia\ImageUploadController@listImages');