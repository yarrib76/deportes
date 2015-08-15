@extends('layouts.master')
@section('contenido')
    <div class="container">
        <div id='wrap'>
            <div id='external-events'>
                <h4>{{$actividadAsignada->actividad->nombre}}</h4>
                <div class='fc-event' costo='{{$actividadAsignada->costo}}'>Pago: {{$actividadAsignada->costo}}</div>
                <script>
                        var tipoConsulta = "actividad_asignada";
                        var id = {{{$actividadAsignada->id}}}
                </script>
            </div>

            <div id='calendar'></div>

            <div style='clear:both'></div>

        </div>
    </div>
@stop
@section('extra-javascript')
    <link href='/fullcalendar/fullcalendar.css' rel='stylesheet' />
    <link href='/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
    <link href='/css/librerias/fullcalendar/calendar.css' rel='stylesheet' />

    <script src='/fullcalendar/lib/moment.min.js'></script>
    <script src='/fullcalendar/lib/jquery.min.js'></script>
    <script src='/fullcalendar/lib/jquery-ui.custom.min.js'></script>
    <script src='/fullcalendar/fullcalendar.min.js'></script>
    <script src='/fullcalendar/lang/es.js'></script>
    <script src='/fullcalendar/pagos/calendario.js'></script>

@stop
