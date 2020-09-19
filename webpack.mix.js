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
    .js('resources/js/home/index.js', 'public/js/home')
    .js('resources/js/home/articles-block-new.js', 'public/js/home')
    .js('resources/js/home/teams/team.js', 'public/js/home')
    .js('resources/js/home/season/season.js', 'public/js/home/season')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/home/index.scss', 'public/css/home')
    .sass('resources/sass/home/contact.scss', 'public/css/home')
    .sass('resources/sass/home/league-info.scss', 'public/css/home')
    .sass('resources/sass/home/articles/articles.scss', 'public/css/home')
    .sass('resources/sass/home/teams/team.scss', 'public/css/home/teams')
    .sass('resources/sass/home/articles/article.scss', 'public/css/home')
    .sass('resources/sass/home/articles/articles-block.scss', 'public/css/home')
    .sass('resources/sass/home/articles/articles-block-new.scss', 'public/css/home')
    .sass('resources/sass/home/season/season.scss', 'public/css/home/season')
    .sass('resources/sass/admin/layout.scss', 'public/css/admin')
    .sass('resources/sass/admin/home.scss', 'public/css/admin')
    .sass('resources/sass/admin/leagues.scss', 'public/css/admin')
    .sass('resources/sass/admin/teams.scss', 'public/css/admin')

