@extends('layouts.master')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 ">
                <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fa fa-cog">Registro de Logins</i></div>
                    <div class="panel-body">
                            <table id="reporte" class="table table-striped table-bordered records_list">
                                <thead>
                                    <tr>
                                        <th>Usuario</th>
                                        <th>Ultimo Login</th>
                                        <th>Ip Client</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($trackLogins as $login)
                                        <tr>
                                            <td>{{$login->usuario->name}}</td>
                                            <td>{{$login->ultimo_login}}</td>
                                            <td>{{$login->ip_cliente}}</td>
                                        </tr>
                                        @endforeach
                                </tbody>
                            </table>
                            {!! HTML::linkRoute('home', ' Volver ', null , ['class' => 'btn btn-primary'] ) !!}
                            {!! HTML::linkRoute('administrador.borrarlogins', ' Borrar Logins ', null , ['class' => 'btn btn-danger'] ) !!}
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
                            lengthMenu:    "Mostrar _MENU_ usuarios",
                            info:           "Mostrando del  _START_ al _END_ de _TOTAL_ usuarios",
                            infoEmpty:      "0 usuarios",
                            infoFiltered:   "(Filtrando _MAX_ usuarios en total)",
                            infoPostFix:    "",
                            loadingRecords: "Chargement en cours...",
                            zeroRecords:    "No se encontraron logins registrados para esa busqueda",
                            emptyTable:     "No existen logins registrados",
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