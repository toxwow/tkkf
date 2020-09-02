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
    .js('resources/js/index.js', 'public/js')
    .js('resources/js/admin/articles.js', 'public/js/admin')
    .js('resources/js/admin/leagues.js', 'public/js/admin')
    .js('resources/js/admin/matchesForm.js', 'public/js/admin')
    .js('resources/js/admin/teams.js', 'public/js/admin')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/admin/layout.scss', 'public/css/admin')
    .sass('resources/sass/admin/home.scss', 'public/css/admin')
    .sass('resources/sass/admin/leagues.scss', 'public/css/admin')
    .sass('resources/sass/admin/teams.scss', 'public/css/admin')

