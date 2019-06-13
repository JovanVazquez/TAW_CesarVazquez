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
/*
mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');
*/

mix.styles([
   'resources/plantilla/css/font-awesome.min.css',
   'resources/plantilla/css/simple-line-icons.min.css',
   'resources/plantilla/css/style.css',

],'public/css/plantilla.css')

.scripts([
   'resources/plantilla/js/bootstrap.min.js',
   'resources/plantilla/js/Chart.min.js',
   'resources/plantilla/js/jquery.min.js',
   'resources/plantilla/js/pace.min.js',
   'resources/plantilla/js/poopper.min.js',
   'resources/plantilla/js/template.min.js',
],'public/js/plantilla.js')