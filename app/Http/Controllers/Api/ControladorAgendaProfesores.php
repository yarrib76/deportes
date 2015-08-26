<?php namespace Deportes\Http\Controllers\Api;

use Deportes\Actividades\Actividad;
use Deportes\Http\Requests;
use Deportes\Http\Controllers\Controller;

use Deportes\Profesores\Profesor;
use Deportes\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class ControladorAgendaProfesores extends Controller {

    public function listaCalendario(){

        $usuario = User::find(Input::get('usuario_id'));
        $profesor = Profesor::where('usuario_id',Input::get('profesor_id'))->get();
        $actividadesProfesor = $profesor[0]->actividad()->get();
        $actividadAsignada = $usuario->actividadesAsignadas()
            ->where('actividad_id', $actividadesProfesor[0]->id)
            ->get()->load('agenda', 'actividad');
        $agendaFinal = $this->preparoJson($actividadAsignada);
        return Response::json($agendaFinal);
    }

    public function preparoJson($datos){
        $x = 0;
        $agenedaFinal = [];
        foreach ($datos as $dato){
            if ($dato->agenda) {
                foreach ($dato->agenda as $agenda) {
                    $agenedaFinal[$x] = ['id' => $agenda->id] + ['end' => $agenda->end]
                        + ['end' => $agenda->end] + ['url' => $agenda->url]
                        + ['color' => $agenda->color] + ['allDay' => $agenda->allDay]
                        + ['start' => $agenda->start];
                    if ($agenda->color == "#C20000"){
                        $agenedaFinal[$x] = $agenedaFinal[$x] + ['title' => $agenda->title];
                    }
                    if ($agenda->color == "#006600"){
                        $agenedaFinal[$x] = $agenedaFinal[$x] + ['title' => $agenda->title];
                    }
                    if ($agenda->color !== "#C20000" and $agenda->color !== "#006600") {
                        $agenedaFinal[$x] = $agenedaFinal[$x] + ['title' => $dato->actividad->nombre];
                    }
                    $x++;
                }
            }
        }
        return $agenedaFinal;
    }

}
