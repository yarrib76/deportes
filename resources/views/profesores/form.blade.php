<div class="form-group">

    {!! Form::label('profesor', 'Profesor:', ['class' => 'col-sm-3 control-label']) !!}

    <div class="col-sm-6">
        {!! Form::select('profesor', $profesores, null, ['id' => 'profesor', 'class' => 'form-control', 'name' => 'profesor_id']) !!}
    </div>
</div>

<div class="form-group">

    {!! Form::label('apellido', 'Apellido :', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::input('apellido', 'apellido', null, ['id' => 'apellido', 'class' => 'form-control', 'name' => 'apellido'])  !!}
    </div>
</div>

<div class="form-group">

    {!! Form::label('movil', 'Movil :', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::input('movil', 'movil', null, ['id' => 'movil', 'class' => 'form-control patente', 'name' => 'movil', 'placeholder' => 'Numero de Movil'])  !!}
    </div>
</div>

<div class="form-group">

    {!! Form::label('actividad', 'Actividad:', ['class' => 'col-sm-3 control-label']) !!}

    <div class="col-sm-6">
        {!! Form::select('actividad', $actividades, null, ['id' => 'actividad', 'class' => 'form-control', 'name' => 'actividad_id']) !!}
    </div>
</div>
