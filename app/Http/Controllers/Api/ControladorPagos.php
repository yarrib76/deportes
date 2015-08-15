<?php

namespace Deportes\Http\Controllers\Api;

use Deportes\ActividadesAsignadas\Actividades_Asignadas;
use Deportes\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;


class ControladorPagos extends Controller{

    public function listaPagos(){

        $pagos = Actividades_Asignadas::find(Input::get('actividad_asignada_id'))->load('pagos');
        return Response::json($pagos->pagos);
    }
}