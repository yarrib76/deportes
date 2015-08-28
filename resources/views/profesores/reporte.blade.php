@extends('layouts.master')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 ">
                <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fa fa-cog">Lista de Profesores</i></div>
                    <div class="panel-body">
                            <table id="reporte" class="table table-striped table-bordered records_list">
                                <tr>
                                    <th>Nombre Profesor</th>
                                    <th>Actividad</th>
                                    <th>Accion</th>
                                </tr>
                                    @foreach($profesores as $profesor)
                                    <tr>
                                        <td>{{$profesor->usuario->name}}</td>
                                        <td>{{$profesor->actividad->nombre}}</td>
                                        <td>
                                            {!! HTML::linkRoute('asignarprofesor.edit', ' Editar', $profesor->id , ['class' => 'btn btn-primary'] ) !!}
                                            {!! HTML::linkRoute('asignarprofesor.destroy', ' Borrar', $profesor->id , ['class' => 'btn btn-danger', 'data-method' => 'DELETE','data-confirm' => '¿Seguro desea eliminar el profesro ' . $profesor->nombre . '?', 'rel' => 'nofollow']) !!}
                                        </td>
                                    </tr>
                                    @endforeach
                            </table>
                            {!! HTML::linkRoute('asignarprofesor.create', ' Asignar ', null , ['class' => 'btn btn-primary'] ) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop