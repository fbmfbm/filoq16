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

Route::get('/home', 'HomeController@index');
Route::get('/zonage', 'ZonageController@index');
Route::get('/thema/offre/{convent}', 'ThemaController@offre_logmt');
Route::get('/thema/construct/{convent}', 'ThemaController@construct_logmt');

Route::post('/jx/geojson', 'AjaxController@getGeojson');
Route::post('/jx/pgdata', 'AjaxController@getPGData');
