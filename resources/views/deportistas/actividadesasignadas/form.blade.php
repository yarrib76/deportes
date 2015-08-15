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
        <input id="L" type=checkbox value='L,' name='L' > Lunes
        <input id="M" type=checkbox value='M,' name='M'> Martes
        <input id="Mi" type=checkbox value='Mi,' name='Mi'> Miercoles
        <input id="J" type=checkbox value='J,' name='J'> Jueves
        <input id="V" type=checkbox value='V,' name='V'> Viernes
        <input id="S" type=checkbox value='S,' name='S'> Sabado
        <input id="D" type=checkbox value='D,' name='D'> Domingo
        @if (isset($fechas))
            @foreach($fechas as $fecha)
                <script>
                    switch ('{{{$fecha}}}')
                    {
                        case 'L':
                            document.getElementById('L').checked = true;
                            break;
                        case 'M':
                            document.getElementById("M").checked = true;
                            break;
                        case 'Mi':
                            document.getElementById("Mi").checked = true;
                            break;
                        case 'J':
                            document.getElementById("J").checked = true;
                            break;
                        case 'V':
                            document.getElementById("V").checked = true;
                            break;
                        case 'S':
                            document.getElementById("S").checked = true;
                            break;
                        case 'D':
                            document.getElementById("D").checked = true;
                            break;
                    }</script>
            @endforeach
        @endif
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

