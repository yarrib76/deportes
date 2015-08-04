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


Route::get('/', 'Actividades\ActividadesController@index');

Route::get('home', 'Actividades\ActividadesController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

//Vista y ABM Actividades
Route::resource('actividad','Actividades\ActividadesController');

//Vista y ABM Proferores
Route::resource('profesor', 'Profesores\ProfesoresController');

