@extends('layouts.master')
@section('contenido')

<div class="container">
	<div class="row">
		<div class="col-md-1100 col-md-offset-0">
			<div class="panel panel-default">
				<div class="panel-heading">Calendarios de Torneos</div>
                    <table id="home" class="table table-striped table-bordered records_list">
                        <tr>
                            <th>
                                <div class="panel-body">
                                    <iframe src="http://juniorcup.com.ar/calendario-metropolitano/" width="530" height="500" frameborder="2"></iframe>
                                </div>
                            </th>
                            <th>
                                <div class="panel-body">
                                    <iframe src="http://www.aatenis.com.ar/es/calendario.php" width="530" height="500" frameborder="2"></iframe>
                                </div>
                            </th>
                        </tr>
                    </table>
			</div>
		</div>
	</div>
</div>
@endsection
