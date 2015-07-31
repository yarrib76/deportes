<div class="form-group">

    {!! Form::label('nombre', 'Nombre :', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::input('nombre', 'nombre', null, ['id' => 'nombre', 'class' => 'form-control patente', 'name' => 'nombre', 'placeholder' => 'Nombre de la Actividad'])  !!}
    </div>
</div>

<div class="form-group">

    {!! Form::label('detalle', 'Detalle :', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::input('detalle', 'detalle', null, ['id' => 'descripcion', 'class' => 'form-control', 'name' => 'descripcion'])  !!}
    </div>
</div>
