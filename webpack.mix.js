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

mix.options({
    extractVueStyles: false,
    purifyCss:false,
});

mix.js('resources/js/app.js', 'public/js');
mix.js('resources/js/custom.js', 'public/js');

mix.sass('resources/sass/app.scss', 'public/css',{
    outputStyle: mix.inProduction ? 'compressed' : 'expanded'
});

