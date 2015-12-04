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


Route::model('actividades_asignadas', 'Deportes\ActividadesAsignadas\Actividades_Asignadas');
Route::model('agenda', 'Deportes\Agenda\Agenda');
Route::model('pagos', 'Deportes\Pagos\Pagos');



Route::get('home', 'Actividades\ActividadesController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

//Administradores
route::get('administrador/tracklogins', ['as' => 'administrador.tracklogins', 'uses' => 'Administradores\AdministradorController@trackLogins']);
route::get('administrador/borrarlogins', ['as' => 'administrador.borrarlogins', 'uses' => 'Administradores\AdministradorController@borrarLogins']);

//Vista y ABM Actividades
Route::resource('actividad', 'Actividades\ActividadesController');
Route::resource('asignarprofesor', 'Actividades\AsignarProfesorController');

//Vista y ABM Proferores
Route::get('profesor/agenda',['as' => 'profesor.agenda', 'uses' => 'Profesores\ProfesoresController@agenda']);

//Vista y ABM Agenda
Route::resource('agenda', 'Agenda\AgendaController');

//Vista y ABM Pagos
Route::resource('pagos', 'Deportistas\Pagos\PagosController');

//Vista y ABM ActividadesAsignadas
Route::resource('actividades_asignadas', 'Deportistas\ActividadesAsignadas\ActividadesAsignadasController');
Route::get('actividades_asignadas_miUsuario', 'Deportistas\ActividadesAsignadas\ActividadesAsignadasController@indexMiUsuario');

Route::group(['prefix' => 'api'],
    function () {

        Route::get('/profesores', 'Api\ControladorProfesores@listaProfesores');
        Route::get('/agenda', 'Api\ControladorAgenda@listaCalendario');
        Route::get('/agendaProfesores', 'Api\ControladorAgendaProfesores@listaCalendario');
        Route::get('/pagos', 'Api\ControladorPagos@listaPagos');
        Route::get('/usuarios', 'Api\ControladorUsuarios@listaUsuarios');
    });