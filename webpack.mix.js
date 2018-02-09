let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
    .styles([
        'resources/assets/css/vendor/normalize.css',
        'resources/assets/css/vendor/bootstrap.min.css',
        'resources/assets/css/header.css',
        'resources/assets/css/icomoon.css',
        'resources/assets/css/footer.css',
        'resources/assets/css/management.css',
        'resources/assets/css/categories.css'
    ], 'public/css/all.css')
    .styles([
        'resources/assets/css/home.css',
        'resources/assets/css/featured.css',
        'resources/assets/css/carousel.css'
    ], 'public/css/home.css')
    .styles([
        'resources/assets/css/no-home.css',
        'resources/assets/css/product.css'
    ], 'public/css/product.css')
    .styles([
        'resources/assets/css/no-home.css',
        'resources/assets/css/search.css'
    ], 'public/css/search.css');