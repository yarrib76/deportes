@extends('layouts.master')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fa fa-cog">Editar Actividades</i></div>
                    <div class="panel-body">
                        @include('errors.basic')

                        {!! Form::model($actividades_asignadas,[ 'route' => ['actividades_asignadas.update',$actividades_asignadas], 'method' => 'PATCH','class' => 'form-horizontal']) !!}

                        @include('deportistas.actividadesasignadas.form')
                        <div class="col-sm-offset-3 col-sm-3">
                            <button type="submit" class="btn btn-primary" name="modificar"><i class="fa fa-btn"></i>Modificar</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('extra-javascript')
    <script src="/js/cargoModelosEnSelect.js"></script>
@stop
