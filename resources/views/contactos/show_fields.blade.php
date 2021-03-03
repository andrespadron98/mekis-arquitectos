<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{{ $contactos->nombre }}</p>
</div>

<!-- Celular Field -->
<div class="form-group">
    {!! Form::label('celular', 'Celular:') !!}
    <p>{{ $contactos->celular }}</p>
</div>

<!-- Correo Field -->
<div class="form-group">
    {!! Form::label('correo', 'Correo:') !!}
    <p>{{ $contactos->correo }}</p>
</div>

<!-- Cuentanos Field -->
<div class="form-group">
    {!! Form::label('cuentanos', 'Cuentanos:') !!}
    <p>{{ $contactos->cuentanos }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $contactos->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $contactos->updated_at }}</p>
</div>

