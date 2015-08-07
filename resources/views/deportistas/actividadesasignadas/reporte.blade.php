@extends('layouts.master')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 ">
                <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fa fa-cog">Actividades Asignadas</i></div>
                    <div class="panel-body">
                            <table id="reporte" class="table table-striped table-bordered records_list">
                                <tr>
                                    <th>Alumno</th>
                                    <th>Actividad</th>
                                    <th>Profesor</th>
                                    <th>Dias</th>
                                    <th>Costo</th>
                                    <th>Accion</th>
                                </tr>
                                    @foreach($actividades as $actividad)
                                    <tr>
                                        <td>{{$actividad->usuario->name}}</td>
                                        <td>{{$actividad->actividad->nombre}}</td>
                                        <td>{{$actividad->profesor->nombre}}</td>
                                        <td>{{$actividad->fecha}}</td>
                                        <td>{{$actividad->costo}}</td>

                                        <td>
                                            {!! HTML::linkRoute('actividades_asignadas.edit', ' Editar', $actividad->id , ['class' => 'btn btn-primary'] ) !!}
                                            {!! HTML::linkRoute('actividades_asignadas.destroy', ' Borrar', $actividad->id , ['class' => 'btn btn-danger', 'data-method' => 'DELETE','data-confirm' => '¿Seguro desea eliminar la Actividad ' . $actividad->nombre . '?', 'rel' => 'nofollow']) !!}
                                        </td>
                                    </tr>
                                    @endforeach
                            </table>
                            {!! HTML::linkRoute('actividades_asignadas.create', ' Asignar Actividad', null , ['class' => 'btn btn-primary fa fa-taxi'] ) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop