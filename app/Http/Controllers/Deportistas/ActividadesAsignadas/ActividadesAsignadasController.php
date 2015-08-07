<?php namespace Deportes\Http\Controllers\Deportistas\ActividadesAsignadas;

use Deportes\Actividades\Actividad;
use Deportes\ActividadesAsignadas\Actividades_Asignadas;
use Deportes\Http\Requests;
use Deportes\Http\Controllers\Controller;

use Deportes\Profesores\Profesor;
use Deportes\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ActividadesAsignadasController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $actividades = Actividades_Asignadas::get()->load('profesor','actividad','usuario');
        return view('deportistas.actividadesasignadas.reporte', compact('actividades'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $deportistas = User::get()->lists('name','id');
        $actividades = Actividad::get()->sortBy('id')->lists('nombre','id');
        $actividad_id = Actividad::get()->first()->id;
        $profesores = Profesor::where('actividad_id', $actividad_id)->get()->lists('nombre','id');
        return view ('deportistas.actividadesasignadas.nuevo', compact('profesores','deportistas','actividades'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        Actividades_Asignadas::create([
            'usuario_id' => Input::get('deportista_id'),
            'actividad_id' => Input::get('actividad_id'),
            'profesor_id' => Input::get('profesor_id'),
            'fecha' => 'LM',
            'costo' => Input::get('precio')
        ]);
        return redirect()->route('actividades_asignadas.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        //Asigno la lista de todos los deportitas
        $deportistas = User::get()->lists('name','id');
        //Asigno el id del deportista que tiene asignada la actividad
        $deportista_id = Actividades_Asignadas::find($id)->usuario_id;
        //Asigno la lista de todas las actividades
        $actividades = Actividad::get()->sortBy('id')->lists('nombre','id');
        //Asigno el ID de la Actividad Asignada
        $actividad_id = Actividades_Asignadas::find($id)->actividad_id;
        //Asigno los profesores que realizan una determinada Actividad
        $profesores = Profesor::where('actividad_id', $actividad_id)->get()->lists('nombre','id');
        //Asigno el Id del profesor de la actividad asignada
        $profesor_id = Actividades_Asignadas::find($id)->profesor_id;
        return view ('deportistas.actividadesasignadas.edit', compact('profesores','deportistas','actividades','deportista_id','actividad_id','profesor_id'));

    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		dd($id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
