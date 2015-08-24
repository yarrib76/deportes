@extends('layouts.master')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 ">
                <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fa fa-cog">Actividades Asignadas</i></div>
                    <div class="panel-body">
                            <table id="reporte" class="table table-striped table-bordered records_list">
                                <thead>
                                <tr>
                                    <th>Alumno</th>
                                    <th>Actividad</th>
                                    <th>Profesor</th>
                                    <th>Dias</th>
                                    <th>Costo</th>
                                    <th>Accion</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($actividades as $actividad)
                                    <tr>
                                        <td>{{$actividad['alumno']}}</td>
                                        <td>{{$actividad['actividad']}}</td>
                                        @if (isset($actividad['profesor']))
                                            <td>{{$actividad['profesor']}}</td>
                                        @else
                                            <td>Fue Eliminado</td>
                                        @endif
                                        <td>{{$actividad['fecha']}}</td>
                                        <td>{{$actividad['costo']}}</td>

                                        <td>
                                            {!! HTML::linkRoute('actividades_asignadas.edit', ' Editar', $actividad['id'] , ['class' => 'btn btn-primary'] ) !!}
                                            {!! HTML::linkRoute('actividades_asignadas.destroy', ' Borrar', $actividad['id'] , ['class' => 'btn btn-danger', 'data-method' => 'DELETE','data-confirm' => '¿Seguro desea eliminar la Actividad ' . $actividad['actividad'] . '?', 'rel' => 'nofollow']) !!}
                                            {!! HTML::linkRoute('agenda.index', 'Asistencia', ['actividad_id' => $actividad['id']] , ['class' => 'btn btn-primary'] ) !!}
                                            {!! HTML::linkRoute('pagos.index', 'Pagos', ['actividad_id' => $actividad['id']] , ['class' => 'btn btn-primary'] ) !!}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        <table>
                            <td>
                                <h4>Total: {{$total}}</h4>
                            </td>
                            <tr>
                                <td>
                                    {!! HTML::linkRoute('actividades_asignadas.create', ' Asignar Actividad', null , ['class' => 'btn btn-primary '] ) !!}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('extra-javascript')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/1.10.6/integration/bootstrap/3/dataTables.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/1.10.6/integration/font-awesome/dataTables.fontAwesome.css">

    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.6/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/plug-ins/1.10.6/integration/bootstrap/3/dataTables.bootstrap.js"></script>
    <!-- DataTables -->

    <script type="text/javascript">

        $(document).ready( function () {
            $('#reporte').DataTable({

                        "lengthMenu": [ [8,  16, 32, -1], [8, 16, 32, "Todos"] ],
                        language: {
                            search: "Buscar:",
                            "thousands": ",",
                            processing:     "Traitement en cours...",
                            lengthMenu:    "Mostrar _MENU_ actividades",
                            info:           "Mostrando del  _START_ al _END_ de _TOTAL_ moviles",
                            infoEmpty:      "0 moviles",
                            infoFiltered:   "(Filtrando _MAX_ actividades en total)",
                            infoPostFix:    "",
                            loadingRecords: "Chargement en cours...",
                            zeroRecords:    "No se encontraron actividades asignadas para esa busqueda",
                            emptyTable:     "No existen actividades asignadas",
                            paginate: {
                                first:      "Primero",
                                previous:   "Anterior",
                                next:       "Proximo",
                                last:       "Ultimo"
                            }
                        }
                    }

            );
        } );
    </script>
@stop