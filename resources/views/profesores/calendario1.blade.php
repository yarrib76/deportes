@extends('layouts.master')
@section('contenido')
    <div class="container">
        <div id='wrap'>

            <div id='external-events'>
                <div class="form-group">

                    {!! Form::label('usuario', 'Seleccionar Alumno:', ['class' => 'col-sm-3 control-label']) !!}

                    <div class="col-sm-12">
                        {!! Form::select('usuario', $usuarios, null, ['id' => 'usuario', 'class' => 'form-control', 'name' => 'usuario_id']) !!}
                    </div>
                </div>
            </div>
            <script>
                var tipoConsulta = "usuario";
                var id=document.getElementById("usuario").value;
                var profesor_id = {{{$usuarioIdProfesor}}};
            </script>
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
