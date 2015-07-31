<?php namespace Deportes\Http\Controllers\Actividades;

use Deportes\Actividades\Actividad;
use Deportes\Http\Controllers\Controller;

class ActividadesController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(){
       $actividad = new Actividad();
        return view('actividades.reporte');

    }
}