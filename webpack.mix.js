const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.autoload({
    jquery: ['$', 'window.jQuery', 'jQuery'],
    moment: 'moment'
});

/* Страница / */
mix.js([
    'resources/js/employer/add_employers.js'
], 'public/js/add_employers.js');
mix.js([
    'resources/js/employer/delete_employer.js'
], 'public/js/delete_employer.js');
mix.js([
    'resources/js/employer/get_employers.js'
], 'public/js/get_employers.js');
mix.js([
    'resources/js/employer/show_employer.js'
], 'public/js/show_employer.js');
mix.js([
    'resources/js/employer/pagination.js'
], 'public/js/pagination.js');

// mix.js('resources/js/app.js', 'public/js')
mix.sass('resources/css/app.scss', 'public/css')
