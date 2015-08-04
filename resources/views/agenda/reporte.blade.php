@extends('layouts.master')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 ">
                <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fa fa-cog">Agenda de Actividades</i></div>
                    <div class="panel-body">
                            <table id="reporte" class="table table-striped table-bordered records_list">
                                <tr>
                                    <th>Alumno</th>
                                    <th>Actividad</th>
                                    <th>Profesor</th>
                                    <th>Dias</th>
                                    <th>Accion</th>
                                </tr>
                                    @foreach($agendas as $agenda)
                                    <tr>
                                        <td>{{$agenda->usuario->name}}</td>
                                        <td>{{$agenda->actividad->nombre}}</td>
                                        <td>{{$agenda->profesor->nombre}}</td>
                                        <td>{{$agenda->fecha}}</td>

                                        <td>
                                            {!! HTML::linkRoute('actividad.edit', ' Editar', $agenda->id , ['class' => 'btn btn-primary'] ) !!}
                                            {!! HTML::linkRoute('actividad.destroy', ' Borrar', $agenda->id , ['class' => 'btn btn-danger', 'data-method' => 'DELETE','data-confirm' => '¿Seguro desea eliminar la Actividad ' . $agenda->nombre . '?', 'rel' => 'nofollow']) !!}
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