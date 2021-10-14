const mix = require("laravel-mix");

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

mix.js("resources/js/app.js", "public/js")
    .copy("resources/js/soft-ui-dashboard.js", "public/css")
    .copy("resources/css/*", "public/css")
    .sass("resources/sass/app.scss", "public/css")
    .webpackConfig(require("./webpack.config"));

if (mix.inProduction()) {
    mix.version();
}