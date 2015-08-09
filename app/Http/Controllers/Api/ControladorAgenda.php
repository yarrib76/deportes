<?php

namespace Deportes\Http\Controllers\Api;

use Deportes\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class ControladorAgenda extends Controller{

    public function listaCalendario(){

       return Response::json(DB::table('agenda')->get());
    }
}