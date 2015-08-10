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
            if ($agenda->title !== "Recuperar") {
                $agenda->title = $nombreActividadesAsignadas;
                $agendaFinal[$x] = $agenda;
            }
            $agendaFinal[$x] = $agenda;
            $x++;
        }
       return $agendaFinal;
    }
}