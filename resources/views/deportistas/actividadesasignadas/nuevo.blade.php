@extends('layouts.master')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fa fa-cog">Asignar Actividades</i></div>
                        <div class="panel-body">
                            @include('errors.basic')

                            {!! Form::open(['class' => 'form-horizontal', 'route' => ['actividades_asignadas.store'] ]) !!}
                                @include('deportistas.actividadesasignadas.form')
                            <div class="col-sm-offset-3 col-sm-3">
                                <button type="submit" class="btn btn-primary" name="agregar"><i class="fa fa-btn fa-plus"></i> Agregar</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('extra-javascript')
    <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"/>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"/>
    <script src="http://multidatespickr.sourceforge.net/jquery-ui.multidatespicker.js"/>
    <script type="text/javascript" src="/MultiDatesPicker/js/jquery-1.11.1.js"></script>
    <script type="text/javascript" src="/MultiDatesPicker/js/jquery-ui-1.11.1.js"></script>
    <script type="text/javascript" src="/MultiDatesPicker/js/jquery-2.1.1.js"></script>
    <script type="text/javascript" src="/MultiDatesPicker/js/jquery-ui-1.11.1.js"></script>
    <script type="text/javascript" src="/MultiDatesPicker/jquery-ui.multidatespicker.js"></script>
    <script type="text/javascript" src="/MultiDatesPicker/js/prettify.js"></script>
    <script type="text/javascript" src="/MultiDatesPicker/js/lang-css.js"></script>


    <script src="/js/cargoModelosEnSelect.js"></script>
    <script src="/js/dateMultiplePicker.js"></script>



@stop
