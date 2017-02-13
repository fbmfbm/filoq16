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
    mix.sass(['app.scss'], 'public/css/app.css')
    .sass([
        'admin.scss',], 'public/css/admin.css')
    .scripts([
		'/../../../node_modules/jquery/dist/jquery.js',
		'/../../../node_modules/tether/dist/js/tether.js',
		'/../../../node_modules/bootstrap/dist/js/bootstrap.js',
    	'/../../../node_modules/openlayers/dist/ol.js',
    	'/../../../node_modules/angular/angular.js',
    	'/../../../node_modules/angular-sanitize/angular-sanitize.min.js',
        '/../../../node_modules/angular-openlayers-directive/dist/angular-openlayers-directive.js',
        //'/../../../node_modules/canvas-to-blob/index.js',
    	'/../../../node_modules/file-saver/FileSaver.js',
        '/../../../node_modules/table-to-json/lib/jquery.tabletojson.min.js',

        'lib/layerswitcher.js',
    	'app.js',
    	'controllers/main_ctrl.js',
        'controllers/zonage_ctrl.js',
        'controllers/offre_ctrl.js',
        'controllers/construct_ctrl.js',
        'services/geojson_data_service.js',
    	'services/pg_data_service.js',
		'services/csv_service.js',
    	])
	.scripts([
		'/../../../node_modules/jquery/dist/jquery.js',
		'/../../../node_modules/angular/angular.js',
		'/../../../node_modules/tether/dist/js/tether.js',
		'/../../../node_modules/bootstrap/dist/js/bootstrap.js',
        '/../../../node_modules/bootbox/bootbox.js',
		'admin/admin-main.js',
		'admin/controllers/file_controller.js',
		'admin/directives/fileModel.js'
	], 'public/js/admin-main.js')
    .version(['/css/app.css','/css/admin.css', '/js/all.js', 'js/admin-main.js']);
});
