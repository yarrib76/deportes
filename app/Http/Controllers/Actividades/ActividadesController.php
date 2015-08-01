<?php namespace Deportes\Http\Controllers\Actividades;

use Deportes\Actividades\Actividad;
use Deportes\Http\Controllers\Controller;
use Deportes\Http\Requests\GuardarActividadesRequest;
use Illuminate\Support\Facades\Input;

class ActividadesController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(){
       $actividades = Actividad::get();
        return view('actividades.reporte', compact('actividades'));
    }

    public function edit(){
        dd($_REQUEST);
    }

    public function crear(){

        return view ('actividades.nuevo');

    }

    public function guardar(GuardarActividadesRequest $request){
       Actividad::create([
           'nombre' => Input::get('nombre'),
           'descripcion' => Input::get('descripcion')
       ]);
        return redirect()->route('actividad');
    }
}