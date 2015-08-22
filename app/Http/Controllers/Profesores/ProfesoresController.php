<?php namespace Deportes\Http\Controllers\Profesores;

use Deportes\Actividades\Actividad;
use Deportes\Http\Requests;
use Deportes\Http\Controllers\Controller;

use Deportes\Profesores\Profesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ProfesoresController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role.alumno');
    }
    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $profesores = Profesor::all()->load('actividad');
        return view('profesores.reporte', compact('profesores'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$actividades = Actividad::get()->lists('nombre','id');
        return view('profesores.nuevo', compact('actividades'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        Profesor::create([
            'nombre' => Input::get('nombre'),
            'apellido' => Input::get('apellido'),
            'movil' => Input::get('movil'),
            'actividad_id' => Input::get('actividad_id')
        ]);
        return redirect()->route('profesor.index');
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
		dd('Editar al Profesor',$id);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $profesor = Profesor::find($id);
		$profesor->delete();
        return redirect()->route('profesor.index');
	}

}
