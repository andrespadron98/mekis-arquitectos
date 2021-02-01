<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{{ $proyectos->nombre }}</p>
</div>

<!-- Comuna Field -->
<div class="form-group">
    {!! Form::label('comuna', 'Comuna:') !!}
    <p>{{ $proyectos->comuna }}</p>
</div>

<!-- Ciudad Field -->
<div class="form-group">
    {!! Form::label('ciudad', 'Ciudad:') !!}
    <p>{{ $proyectos->ciudad }}</p>
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    <p>{{ $proyectos->descripcion }}</p>
</div>

<!-- Habitaciones Field -->
<div class="form-group">
    {!! Form::label('habitaciones', 'Habitaciones:') !!}
    <p>{{ $proyectos->habitaciones }}</p>
</div>

<!-- Metros Cuadrados Terreno Field -->
<div class="form-group">
    {!! Form::label('metros_cuadrados_terreno', 'Metros Cuadrados Terreno:') !!}
    <p>{{ $proyectos->metros_cuadrados_terreno }}</p>
</div>

<!-- Piscina Field -->
<div class="form-group">
    {!! Form::label('piscina', 'Piscina:') !!}
    <p>{{ $proyectos->piscina }}</p>
</div>

<!-- Jacuzzi Field -->
<div class="form-group">
    {!! Form::label('jacuzzi', 'Jacuzzi:') !!}
    <p>{{ $proyectos->jacuzzi }}</p>
</div>

<!-- Estacionamientos Field -->
<div class="form-group">
    {!! Form::label('estacionamientos', 'Estacionamientos:') !!}
    <p>{{ $proyectos->estacionamientos }}</p>
</div>

<!-- Img Previsualizacion Field -->
<div class="form-group">
    {!! Form::label('img_previsualizacion', 'Img Previsualizacion:') !!}
    <p>{{ $proyectos->img_previsualizacion }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $proyectos->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $proyectos->updated_at }}</p>
</div>

