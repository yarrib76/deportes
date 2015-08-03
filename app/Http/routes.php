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
use Illuminate\Support\Facades\Route;


Route::get('/', 'Actividades\ActividadesController@show');

Route::get('home', 'Actividades\ActividadesController@show');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

//Vista y ABM Actividades
Route::get('actividad', ['as' => 'actividad', 'uses' => 'Actividades\ActividadesController@show']);
Route::post('actividad/editar', ['as' => 'actividad.editar', 'uses' => 'Actividades\ActividadesController@edit']);
Route::get('actividad/crear', ['as' => 'actividad.crear', 'uses' => 'Actividades\ActividadesController@crear']);
Route::post('actividad/guardar', ['as' => 'actividad.guardar', 'uses' => 'Actividades\ActividadesController@guardar']);
Route::delete('actividad/borrar/{id}', ['as' => 'actividad.borrar', 'uses' => 'Actividades\ActividadesController@borrar']);
