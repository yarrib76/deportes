@extends('layouts.master')
@section('contenido')
    <div class="container">
        <div id='wrap'>

            <div id='external-events'>
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
    <script src='/fullcalendar/invitados/calendario.js'></script>

@stop
