<?php namespace Deportes\Http\Controllers\Actividades;

use Deportes\Actividades\Actividad;
use Deportes\Http\Requests;
use Deportes\Http\Controllers\Controller;

use Deportes\Http\Requests\GuardarActividadesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ActividadesController extends Controller {

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
        $actividades = Actividad::get();
        return view('actividades.reporte', compact('actividades'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view ('actividades.nuevo');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(GuardarActividadesRequest $request)
	{
        Actividad::create([
            'nombre' => Input::get('nombre'),
            'club' => Input::get('club'),
            'descripcion' => Input::get('descripcion')
        ]);
        return redirect()->route('actividad.index');
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
        $profesor = Actividad::find($id);
        $profesor->delete();
        return redirect()->route('actividad.index');
	}

}
