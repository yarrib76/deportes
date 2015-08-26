<?php namespace Deportes\Http\Controllers\Invitados;

use Deportes\ActividadesAsignadas\Actividades_Asignadas;
use Deportes\Http\Requests;
use Deportes\Http\Controllers\Controller;
use Deportes\Profesores\Profesor;
use Illuminate\Support\Facades\Auth;


class InvitadosController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role.profe');
    }
    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $profesor_id = Profesor::where('usuario_id', Auth::user()->id)->get();
        $usuarioIdProfesor = Auth::user()->id;
        $profesores = Actividades_Asignadas::where('profesor_id', $profesor_id[0]->id)->get()->load('usuario');
        $usuarios = $this->formateoDatosAlumnos($profesores);
        return view('agenda.invitados.calendario1', compact('usuarios','usuarioIdProfesor'));
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
		//
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
		//
	}

    //Paso los datos a un array para porder levantarlo con el select de Alumnos
    public function formateoDatosAlumnos($datos){

        foreach ($datos as $dato){
            $conFormato[$dato->usuario->id] = $dato->usuario->name;
        }
        return $conFormato;
    }
}
