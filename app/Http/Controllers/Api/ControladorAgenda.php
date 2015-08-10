<?php

namespace Deportes\Http\Controllers\Api;

use Deportes\ActividadesAsignadas\Actividades_Asignadas;
use Deportes\Agenda\Agenda;
use Deportes\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class ControladorAgenda extends Controller{

    public function listaCalendario(){


       return Response::json(DB::table('agenda')
           ->where('actividad_id', Input::get('actividad_id'))
           ->get());
    }
}