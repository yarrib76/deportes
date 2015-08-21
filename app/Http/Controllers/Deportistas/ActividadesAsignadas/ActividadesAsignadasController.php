<?php namespace Deportes\Http\Controllers\Deportistas\ActividadesAsignadas;

use Deportes\Actividades\Actividad;
use Deportes\ActividadesAsignadas\Actividades_Asignadas;
use Deportes\Http\Requests;
use Deportes\Http\Controllers\Controller;

use Deportes\Profesores\Profesor;
use Deportes\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ActividadesAsignadasController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role');
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $actividades = Actividades_Asignadas::get()->load('profesor','actividad','usuario');
        $total = $this->obtengoTotal($actividades);
        return view('deportistas.actividadesasignadas.reporte', compact('actividades','total'));
	}

    /**
     * Metodo que genera consulta las actividades asignada a al
     * usario logueado y lo envia al reporte.
     * @return \Illuminate\View\View
     */
    public function indexMiUsuario()
    {
        $usuario = Auth::user();
        $actividadesAsignadasAUnUsuario = $usuario->actividadesAsignadas()->get()->load('actividad','profesor');
        $total = $this->obtengoTotal($actividadesAsignadasAUnUsuario);
        return view('deportistas.actividadesasignadas.miusuario.reporte', compact('usuario','actividadesAsignadasAUnUsuario','total'));
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
        $fecha = $this->concatenarFecha($_REQUEST);
        Actividades_Asignadas::create([
            'usuario_id' => Input::get('deportista_id'),
            'actividad_id' => Input::get('actividad_id'),
            'profesor_id' => Input::get('profesor_id'),
            'fecha' =>  $fecha,
            'costo' => Input::get('costo')
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
	public function edit($actividades_asignadas)
	{
        //Asigno la lista de todos los deportitas
        $deportistas = User::get()->lists('name','id');
        //Asigno el id del deportista que tiene asignada la actividad
        $deportista_id = $actividades_asignadas->usuario_id;
        //Asigno la lista de todas las actividades
        $actividades = Actividad::get()->sortBy('id')->lists('nombre','id');
        //Asigno el ID de la Actividad Asignada
        $actividad_id = $actividades_asignadas->actividad_id;
        //Asigno los profesores que realizan una determinada Actividad
        $profesores = Profesor::where('actividad_id', $actividad_id)->get()->lists('nombre','id');
        //Asigno el Id del profesor de la actividad asignada
        $profesor_id = $actividades_asignadas->profesor_id;
        $costo = $actividades_asignadas->costo;

        $actividades_asignadas = $this->conviertoFormatoCsvToArray($actividades_asignadas);
        $fechas = $actividades_asignadas->fecha;
        return view ('deportistas.actividadesasignadas.edit', compact('profesores','deportistas','actividades','deportista_id','actividad_id','profesor_id','actividades_asignadas','costo','fechas'));

    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($actividades_asignadas)
	{
        $fecha = $this->concatenarFecha($_REQUEST);
        db::table('actividades_asignadas')
            ->where('id',$actividades_asignadas->id)
            ->update([
        'usuario_id' => Input::get('deportista_id'),
        'actividad_id' => Input::get('actividad_id'),
        'profesor_id' => Input::get('profesor_id'),
        'fecha' =>  $fecha,
        'costo' => Input::get('costo')
    ]);
       // $actividades_asignadas->fill(\Request::input())->save();
        return redirect()->route('actividades_asignadas.index');
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response 
	 */
	public function destroy($actividades_asignadas)
	{
        $actividades_asignadas->delete();
        return redirect()->route('actividades_asignadas.index');

    }

    public function concatenarFecha($datos){
        $fecha = "";
        foreach ($datos as $dato){
            if ($dato === 'L,'or $dato === 'M,'or $dato === 'Mi,' or $dato === 'J,' or $dato === 'V,' or $dato === 'S,' or $dato === 'D,') {
                $fecha  = $fecha . $dato  ;
            }
        }
        return $fecha;
    }

    public function conviertoFormatoCsvToArray($actividades_asignadas){

        $actividades_asignadas->fecha = str_getcsv($actividades_asignadas->fecha);
        return $actividades_asignadas;
    }

    private function obtengoTotal($actividadesAsignadas){
        $total = 0;
        foreach($actividadesAsignadas as $actividadAsignada){
            $total = $total + $actividadAsignada->costo;
        }
        return $total;
    }
}
