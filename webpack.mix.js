const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/assets/sass/style.scss', 'public/css');

mix.styles([
    'resources/assets/css/animate-3.7.0.css',
    'resources/assets/css/font-awesome-4.7.0.min.css',
    'resources/assets/css/bootstrap-4.1.3.min.css',
    'resourcesassets/css/owl-carousel.min.css',
    'resources/assets/css/jquery.datetimepicker.min.css',
    'resources/assets/css/linearicons.css',
    'resources/assets/css/style.css'
], 'public/css/lib.css');

/* mix.sass('resources/assets/sass/style.scss', 'public/css');
 */
mix.scripts([
    'resources/assets/js/vendor/jquery-2.2.4.min.js',
    'resources/assets/js/vendor/bootstrap-4.1.3.min.js',
    'resources/assets/js/vendor/wow.min.js',
    'resources/assets/js/vendor/owl-carousel.min.js',
    'resources/assets/js/vendor/jquery.datetimepicker.full.min.js',
    'resources/assets/js/vendor/jquery.nice-select.min.js',
    'resources/assets/js/vendor/superfish.min.js',
    'resources/assets/js/main.js',

], 'public/js/libs.js');

















