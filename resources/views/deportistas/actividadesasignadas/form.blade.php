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
    {!! Form::label('date', 'Dias de Entrenamiento:', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        <input type=checkbox value='L,' name='L' > Lunes
        <input type=checkbox value='M,' name='M'> Martes
        <input type=checkbox value='Mi,' name='Mi'> Miercoles
        <input type=checkbox value='J,' name='J'> Jueves
        <input type=checkbox value='V,' name='V'> Viernes
        <input type=checkbox value='S,' name='S'> Sabado
        <input type=checkbox value='D,' name='D'> Domingo
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

