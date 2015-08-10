<?php namespace Deportes\Http\Controllers\Api;


use Deportes\Http\Controllers\Controller;
use Deportes\Profesores\Profesor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class ControladorProfesores extends Controller{

    public function listaProfesores()
    {
        return Response::json(DB::table('profesores')
            ->where('actividad_id',  Input::get('category_id'))
            ->where('deleted_at', null)
            ->get());
    }
}