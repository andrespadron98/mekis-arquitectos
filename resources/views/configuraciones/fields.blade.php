<!-- Nombre Field -->
<div class="form-group col-sm-12">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Valor Field -->
<div class="form-group col-sm-12">
    {!! Form::label('valor', 'Valor:') !!}
    {!! Form::textarea('valor', null, ['class'=>'form-control', 'rows' => 5]) !!}

</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('configuraciones.index') }}" class="btn btn-light">Cancel</a>
</div>
