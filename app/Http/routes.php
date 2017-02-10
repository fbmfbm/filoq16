<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::group(['prefix' => 'admin','middleware'=>['auth']], function () {
	
	Route::get('/', ['as'=>'dasboard','uses'=>'Admin\\DashboardController@index']);
	Route::resource('role', 'Admin\\RoleController');
    Route::get('role/{id}/togglperm/{permId}', 'Admin\\RoleController@togglePermission');
	Route::resource('permission', 'Admin\\PermissionController');
	Route::resource('user', 'Admin\\UserController');
    Route::get('user/{id}/active', 'Admin\\UserController@activeUser');
	Route::resource('logstat', 'Admin\\LogStatController');
    Route::resource('file', 'Admin\\FileController');
    Route::get('file/visible/{id}', 'Admin\\FileController@toggl_visible');
});

Route::get('/home', 'HomeController@index');
Route::get('/zonage', 'ZonageController@index');
Route::get('/thema/offre/{convent}', 'ThemaController@offre_logmt');
Route::get('/thema/construct/{convent}', 'ThemaController@construct_logmt');
Route::get('/ressources', 'RessourcesController@index');
Route::get('fileentry/get/{name}', ['as' => 'getfileentry', 'uses' => 'Admin\\FileController@get']);

Route::post('/jx/geojson', 'AjaxController@getGeojson');
Route::post('/jx/pgdata', 'AjaxController@getPGData');
