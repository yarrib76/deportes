<div class="form-group">

    {!! Form::label('deportista', 'Deportista:', ['class' => 'col-sm-3 control-label']) !!}

    <div class="col-sm-6">
        @if (isset($deportista_id))
            {!! Form::select('deportista', $deportistas, $deportista_id, ['id' => 'deportista', 'class' => 'form-control', 'name' => 'deportista_id']) !!}
        @else
            {!! Form::select('deportista', $deportistas, null, ['id' => 'deportista', 'class' => 'form-control', 'name' => 'deportista_id']) !!}
        @endif
    </div>
</div>

<div class="form-group">

    {!! Form::label('actividad', 'Actividad:', ['class' => 'col-sm-3 control-label']) !!}

    <div class="col-sm-6">
        @if (isset($actividad_id))
            {!! Form::select('actividad', $actividades, $actividad_id, ['id' => 'actividad', 'class' => 'form-control', 'name' => 'actividad_id']) !!}
        @else
            {!! Form::select('actividad', $actividades, null, ['id' => 'actividad', 'class' => 'form-control', 'name' => 'actividad_id']) !!}
        @endif
    </div>
</div>

<div class="form-group">

    {!! Form::label('profesor', 'Profesor:', ['class' => 'col-sm-3 control-label']) !!}

    <div class="col-sm-6">
        @if (isset($profesor_id))
            {!! Form::select('profesor', $profesores, $profesor_id, ['id' => 'profesor', 'class' => 'form-control', 'name' => 'profesor_id']) !!}
        @else
            {!! Form::select('profesor', $profesores, null, ['id' => 'profesor', 'class' => 'form-control', 'name' => 'profesor_id']) !!}
        @endif
    </div>
</div>

<div class="form-group">
    {!! Form::label('date', 'Fecha:', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        <input id="datePick" type="text"/>
    </div>
</div>

<div class="form-group">

    {!! Form::label('precio', 'Precio:', ['class' => 'col-sm-3 control-label']) !!}

    <div class="col-sm-6">

        @if (isset($costo))
            {!! Form::input('number', 'precio', $costo, ['id' => 'precio', 'class' => 'form-control', 'name' => 'costo','placeholder' => 'Precio Mensual'])  !!}
        @else
            {!! Form::input('number', 'precio', null, ['id' => 'precio', 'class' => 'form-control', 'name' => 'costo','placeholder' => 'Precio Mensual'])  !!}
        @endif
    </div>
</div>

