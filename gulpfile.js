var elixir = require('laravel-elixir');


/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss')
    .scripts([
    	'/../../../node_modules/angular/angular.js',
    	'app.js',
    	'controllers/main_ctrl.js',
    	])
    .version(['/css/app.css', '/js/all.js']);
});
