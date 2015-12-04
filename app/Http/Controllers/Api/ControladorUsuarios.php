<?php namespace Deportes\Http\Controllers\Api;

use Deportes\Http\Requests;
use Deportes\Http\Controllers\Controller;

use Deportes\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ControladorUsuarios extends Controller {

    public function listaUsuarios(){
        $usuarios = User::all();
        return Response::json($usuarios);
}

}
