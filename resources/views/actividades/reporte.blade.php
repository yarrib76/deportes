@extends('layouts.master')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 ">
                <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fa fa-cog">Lista de Actividades</i></div>
                    <div class="panel-body">
                            <table id="reporte" class="table table-striped table-bordered records_list">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Club</th>
                                        <th>Precio Mendual</th>
                                        <th>Descripcion</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($actividades as $actividad)
                                    <tr>
                                        <td>{{$actividad->nombre}}</td>
                                        <td>{{$actividad->club}}</td>
                                        <td>{{$actividad->precio}}</td>
                                        <td>{{$actividad->descripcion}}</td>
                                        <td>
                                            {!! HTML::linkRoute('actividad.edit', ' Editar', $actividad->id , ['class' => 'btn btn-primary'] ) !!}
                                            {!! HTML::linkRoute('actividad.destroy', ' Borrar', $actividad->id , ['class' => 'btn btn-danger', 'data-method' => 'DELETE','data-confirm' => '¿Seguro desea eliminar la Actividad ' . $actividad->nombre . '?', 'rel' => 'nofollow']) !!}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {!! HTML::linkRoute('actividad.create', ' Crear Actividad', null , ['class' => 'btn btn-primary'] ) !!}
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
                            info:           "Mostrando del  _START_ al _END_ de _TOTAL_ actividades",
                            infoEmpty:      "0 moviles",
                            infoFiltered:   "(Filtrando _MAX_ actividades en total)",
                            infoPostFix:    "",
                            loadingRecords: "Chargement en cours...",
                            zeroRecords:    "No se encontraron actividades para esa busqueda",
                            emptyTable:     "No existen actividades",
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