<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'SolarSystemsController@index');

Route::get('/planets', 'PlanetsController@index');
Route::post('/planets', 'PlanetsController@store');
Route::get('/planets/discover', 'PlanetsController@discover');
Route::get('/planets/{planet}', 'PlanetsController@show');