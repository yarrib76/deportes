@extends('layouts.master')
@section('contenido')
    <div class="container">
        <div id='wrap'>

            <div id='external-events'>
                @if (isset($usuario))
                     <h4>Actividades para: {{$usuario->name}}</h4>
                    @foreach($actividadAsignada as $actividad)
                        <div class='fc-event'>{{$actividad->actividad->nombre}}</div>
                    @endforeach
                    <script>
                        var tipoConsulta = "usuario";
                        var actividadAsignada_id = {{{$usuario->id}}}
                    </script>
                @else
                    <h4>Actividad para: {{$deportista->usuario->name}}</h4>
                    <div class='fc-event'>{{$actividadAsignada->actividad->nombre}}</div>

                        <script>
                            var tipoConsulta = "actividadAsignada";
                            var actividadAsignada_id = {{{$actividadAsignada->id}}}
                        </script>

                @endif

                    <div class='fc-event'>Recuperar</div>
                    <div class='fc-event'>Recuperado</div>

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
