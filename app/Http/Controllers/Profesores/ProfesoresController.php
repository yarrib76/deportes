<?php namespace Deportes\Http\Controllers\Profesores;

use Deportes\ActividadesAsignadas\Actividades_Asignadas;
use Deportes\Http\Requests;
use Deportes\Http\Controllers\Controller;
use Deportes\Profesores\Profesor;
use Illuminate\Support\Facades\Auth;

class ProfesoresController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role.profe');
    }

    public function agenda()
    {
        $profesor_id = Profesor::where('usuario_id', Auth::user()->id)->get();
        $usuarioIdProfesor = Auth::user()->id;
        $profesores = Actividades_Asignadas::where('profesor_id', $profesor_id[0]->id)->get()->load('usuario');
        $usuarios = $this->formateoDatos($profesores);
        return view('profesores.calendario1', compact('usuarios','usuarioIdProfesor'));
    }

    public function formateoDatos($datos){

        foreach ($datos as $dato){
            $conFormato[$dato->usuario->id] = $dato->usuario->name;
        }
        return $conFormato;
    }

}
