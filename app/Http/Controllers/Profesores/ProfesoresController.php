<?php namespace Deportes\Http\Controllers\Profesores;

use Deportes\Actividades\Actividad;
use Deportes\Http\Requests;
use Deportes\Http\Controllers\Controller;

use Deportes\Profesores\Profesor;
use Deportes\Roles\UserRole\UserRole;
use Deportes\User;
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
        $profesores = Profesor::all()->load('actividad','usuario');
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
        $profesores = UserRole::where('role_id',1)->get()->load('usuario');
        $profesores = $this->formateoDatos($profesores);
        return view('profesores.nuevo', compact('actividades','profesores'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        Profesor::create([
            'actividad_id' => Input::get('actividad_id'),
            'usuario_id' => Input::get('profesor_id')
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

    public function formateoDatos($datos){

        foreach ($datos as $dato){
            $conFormato[$dato->usuario->id] = $dato->usuario->name;
        }
        return $conFormato;
    }

}
