<?php namespace Deportes\Http\Controllers\Actividades;

use Deportes\Actividades\Actividad;
use Deportes\ActividadesAsignadas\Actividades_Asignadas;
use Deportes\Http\Requests;
use Deportes\Http\Controllers\Controller;

use Deportes\Profesores\Profesor;
use Deportes\Roles\UserRole\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class AsignarProfesorController extends Controller {

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
        if (!$profesores->isEmpty()){
            $profesores = $this->formateoDatos($profesores);
            return view('profesores.nuevo', compact('actividades','profesores'));
        }
        return response('No hay Profesores creados en la aplicacion');
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
        return redirect()->route('asignarprofesor.index');
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
        return redirect()->route('asignarprofesor.index');
    }

    public function formateoDatos($datos){

        foreach ($datos as $dato){
            $conFormato[$dato->usuario->id] = $dato->usuario->name;
        }
        return $conFormato;
    }

}
