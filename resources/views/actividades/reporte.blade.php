@extends('layouts.master')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 ">
                <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fa fa-cog">Lista de Actividades</i></div>
                    <div class="panel-body">
                            <table id="reporte" class="table table-striped table-bordered records_list">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Club</th>
                                    <th>Descripcion</th>
                                    <th>Accion</th>
                                </tr>
                                    @foreach($actividades as $actividad)
                                    <tr>
                                        <td>{{$actividad->nombre}}</td>
                                        <td>{{$actividad->club}}</td>
                                        <td>{{$actividad->descripcion}}</td>
                                        <td>
                                            {!! HTML::linkRoute('actividad.edit', ' Editar', $actividad->id , ['class' => 'btn btn-primary'] ) !!}
                                            {!! HTML::linkRoute('actividad.destroy', ' Borrar', $actividad->id , ['class' => 'btn btn-danger', 'data-method' => 'DELETE','data-confirm' => '¿Seguro desea eliminar la Actividad ' . $actividad->nombre . '?', 'rel' => 'nofollow']) !!}
                                        </td>
                                    </tr>
                                    @endforeach
                            </table>
                            {!! HTML::linkRoute('actividad.create', ' Crear Actividad', null , ['class' => 'btn btn-primary fa fa-taxi'] ) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop