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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');


    mix.styles([

     	'resources/assets/dashboard/css/materialdesignicons.min.css',
     	'resources/assets/dashboard/css/vendor.bundle.base.css',
     	'resources/assets/dashboard/css/vendor.bundle.addons.css',
     	'resources/assets/dashboard/css/style.css',

     ], 'public/css/dashboard.css');

 mix.scripts([
      'resources/assets/dashboard/js/vendor.bundle.base.js',
      'resources/assets/dashboard/js/vendor.bundle.addons.js',
      'resources/assets/dashboard/js/off-canvas.js',
      'resources/assets/dashboard/js/misc.js',
      'resources/assets/dashboard/js/dashboard.js',    

 	],'public/js/dashboard.js' );
