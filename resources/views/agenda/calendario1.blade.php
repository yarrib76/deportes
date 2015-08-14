@extends('layouts.master')
@section('contenido')
    <div class="container">
        <div id='wrap'>

            <div id='external-events'>
                @if (isset($usuario))
                     <h4>Actividades para: {{$usuario->name}}</h4>
                    @foreach($actividadAsignada as $actividad)
                        <div class='fc-event'  actividadAsignada_id = {{$actividad->id}}>{{$actividad->actividad->nombre}}</div>
                        <div class='fc-event' color = '#C20000' actividadAsignada_id = {{$actividad->id}}>Recuperar {{$actividad->actividad->nombre}}</div>
                        <div class='fc-event' color = '#006600' actividadAsignada_id = {{$actividad->id}}>Recuperado {{$actividad->actividad->nombre}}</div>

                    @endforeach
                    <script>
                        var tipoConsulta = "usuario";
                        var id = {{{$usuario->id}}}
                    </script>

                @else
                    <h4>Actividad para: {{$deportista->usuario->name}}</h4>
                    <div class='fc-event' actividadAsignada_id = {{$actividadAsignada->id}}>{{$actividadAsignada->actividad->nombre}}</div>
                    <div class='fc-event' color = '#C20000' actividadAsignada_id = {{$actividadAsignada->id}}>Recuperar {{$actividadAsignada->actividad->nombre}}</div>
                    <div class='fc-event' color = '#006600' actividadAsignada_id = {{$actividadAsignada->id}}>Recuperado {{$actividadAsignada->actividad->nombre}}</div>
                    <script>
                            var tipoConsulta = "actividadAsignada";
                            var id = {{{$actividadAsignada->id}}}
                        </script>

                @endif



                <p>
                    <input type='checkbox' id='drop-remove' />
                    <label for='drop-remove'>remove after drop</label>
                </p>
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
    <script src='/fullcalendar/calendario.js'></script>

@stop
