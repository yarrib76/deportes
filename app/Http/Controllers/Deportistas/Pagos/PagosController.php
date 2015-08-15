<?php namespace Deportes\Http\Controllers\Deportistas\Pagos;

use Deportes\ActividadesAsignadas\Actividades_Asignadas;
use Deportes\Http\Requests;
use Deportes\Http\Controllers\Controller;

use Deportes\Pagos\Pagos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PagosController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $actividadAsignada = Actividades_Asignadas::find(Input::get('actividad_id'))->load('actividad');
        return view('deportistas.pagos.calendario1', compact ('actividadAsignada'));
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
        Pagos::create([
            'title' => Input::get('title'),
            'start' => Input::get('start'),
            'end' => Input::get('end'),
            'costo' => Input::get('costo'),
            'actividadAsignada_id' => Input::get('actividadAsignada_id'),
            //  'url' => Input::get('url')
        ]);
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
	public function destroy($pagos)
	{
		$pagos->delete();
	}

}
