const { mix } = require('laravel-mix');

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
 // mix.options({
 //   extractVueStyles: false,
 //   processCssUrls: true,
 //   uglify: false,
 //   purifyCss: false,
 //  //  purifyCss: {},
 //   postCss: [require('autoprefixer')],
 //   clearConsole: false
 // });

mix.js('resources/assets/js/index.js', 'js')
   .js('resources/assets/js/app.js', 'js')
   .sass('resources/assets/sass/app/app.scss', 'css')
   .sass('resources/assets/sass/web/style.scss', 'css');
