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
    	'/../../../node_modules/openlayers/dist/ol.js',
    	'/../../../node_modules/angular/angular.js',
    	'/../../../node_modules/angular-sanitize/angular-sanitize.min.js',
    	'/../../../node_modules/angular-openlayers-directive/dist/angular-openlayers-directive.js',
        'lib/layerswitcher.js',
    	'app.js',
    	'controllers/main_ctrl.js',
        'controllers/zonage_ctrl.js',
        'controllers/offre_ctrl.js',
        'services/geojson_data_service.js',
    	'services/pg_data_service.js'
    	])
    .version(['/css/app.css', '/js/all.js']);
});
