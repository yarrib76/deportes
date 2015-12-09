<?php

namespace Deportes\Http\Controllers\Api;

use Deportes\ActividadesAsignadas\Actividades_Asignadas;
use Deportes\Agenda\Agenda;
use Deportes\Http\Controllers\Controller;
use Deportes\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class ControladorAgenda extends Controller{

    public function listaCalendario(){
        if (Input::get('usuario_id')) {
            $usuario = User::find(Input::get('usuario_id'));
            $actividadAsignada = $usuario->actividadesAsignadas()->get()->load('agenda', 'actividad');
            $agendaFinal = $this->preparoJson($actividadAsignada);
            return Response::json($agendaFinal);
        }
        $agenda = Agenda::where('actividadAsignada_id', Input::get('actividadAsignada_id'))->get();
        $agendaFinal = $this->cambioTitle($agenda);
        return Response::json($agendaFinal);
    }

    /**
     * En la consulta cambio el valor del campo title de la tabla Agenda,
     * para que muestre como valor el nombre de la Actividad que esta en la
     * tabla Actividades, a menos que tenga como valor "Recuperar"
     * @param $agendas
     * @return array
     */
    public function cambioTitle($agendas){
        $x = 0;
        $agendaFinal = [];
        foreach ($agendas as $agenda) {
            $agenda->load('actividadesAsignadas');
            $nombreActividadesAsignadas = $agenda->actividadesAsignadas->load('actividad')->actividad->nombre;
            if ($agenda->color !== "#C20000" and $agenda->color !== "#006600") {
                $agenda->title = $nombreActividadesAsignadas;
                $agendaFinal[$x] = $agenda;
            }
            $agendaFinal[$x] = $agenda;
            $x++;
        }
       return $agendaFinal;
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