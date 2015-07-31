@extends('layouts.master')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 ">
                <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fa fa-cog">Lista de Actividades</i></div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="post" action="actividad/editar">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <table id="reporte" class="table table-striped table-bordered records_list">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Accion</th>
                                </tr>
                                    @foreach($actividades as $actividad)
                                    <tr>
                                        <td>{{$actividad->nombre}}</td>
                                        <td>{{$actividad->descripcion}}</td>
                                        <td><button type="submit" name="id" value="{{$actividad->id}}" class="btn btn-primary">Editar</button></td>
                                    </tr>
                                    @endforeach
                            </table>
                            {!! HTML::linkRoute('actividad.crear', ' Crear Actividad', null , ['class' => 'btn btn-primary fa fa-taxi'] ) !!}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop