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

/*
At the time of publishing there were several bugs in postcss-calc affecting how
css-custom-properties are handled in calcs.
https://github.com/postcss/postcss-calc/issues/77
https://github.com/postcss/postcss-calc/issues/107
https://github.com/postcss/postcss-calc/issues/103
https://github.com/postcss/postcss-calc/issues/91

This was breaking the Utopia type-scale calculations at the heart of the frontend.
So we disable CSSNano doing anything with calcs.
 */
mix.options({
    extractVueStyles: false,
    processCssUrls: true,
    terser: {},
    purifyCss: false,
    //purifyCss: {},
    postCss: [
        require('postcss-import'),
        require('postcss-nested'),
        require("tailwindcss"),
        require("autoprefixer")
    ],
    clearConsole: false,
    cssNano: {
        calc: false
    }
});

mix.copy([
    'node_modules/alpinejs/dist/alpine.js',
    'node_modules/alpinejs/dist/alpine-ie11.js',
], 'public/js')


    // .sass('resources/sass/app-ie11.scss', 'public/css')
mix.postCss("resources/css/app.css", "public/css");



mix.minify( [ 'public/js/alpine.js', 'public/js/alpine-ie11.js']);
mix.version();
