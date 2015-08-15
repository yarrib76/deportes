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
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Actividad</th>
                                    <th>Movil</th>
                                    <th>Accion</th>
                                </tr>
                                    @foreach($profesores as $profesor)
                                    <tr>
                                        <td>{{$profesor->nombre}}</td>
                                        <td>{{$profesor->apellido}}</td>
                                        <td>{{$profesor->actividad->nombre}}</td>
                                        <td>{{$profesor->movil}}</td>
                                        <td>
                                            {!! HTML::linkRoute('profesor.edit', ' Editar', $profesor->id , ['class' => 'btn btn-primary'] ) !!}
                                            {!! HTML::linkRoute('profesor.destroy', ' Borrar', $profesor->id , ['class' => 'btn btn-danger', 'data-method' => 'DELETE','data-confirm' => '¿Seguro desea eliminar el profesro ' . $profesor->nombre . '?', 'rel' => 'nofollow']) !!}
                                        </td>
                                    </tr>
                                    @endforeach
                            </table>
                            {!! HTML::linkRoute('profesor.create', ' Agregar Profesor', null , ['class' => 'btn btn-primary fa fa-taxi'] ) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop