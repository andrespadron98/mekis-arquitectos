<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Categorias Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categorias', 'Categorias:') !!}
    {!! Form::select('categorias', $categoriasItems, null, ['class' => 'form-control', 'multiple' => 'multiple', 'name' => 'categorias[]']) !!}
</div>

<!-- Tipo Proyecto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo', 'Tipo de Proyecto:') !!}
    {!! Form::select('tipo', $tiposItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Comuna Field -->
<div class="form-group col-sm-6">
    {!! Form::label('comuna', 'Comuna:') !!}
    {!! Form::text('comuna', null, ['class' => 'form-control']) !!}
</div>

<!-- Ciudad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ciudad', 'Ciudad:') !!}
    {!! Form::text('ciudad', null, ['class' => 'form-control']) !!}
</div>


<!-- Habitaciones Field -->
<div class="form-group col-sm-6">
    {!! Form::label('habitaciones', 'Habitaciones:') !!}
    {!! Form::number('habitaciones', null, ['class' => 'form-control']) !!}
</div>

<!-- banos Field -->
<div class="form-group col-sm-6">
    {!! Form::label('banos', 'Baños:') !!}
    {!! Form::number('banos', null, ['class' => 'form-control']) !!}
</div>

<!-- metros_cuadrados Field -->
<div class="form-group col-sm-6">
    {!! Form::label('metros_cuadrados', 'Metros Cuadrados Construcción:') !!}
    {!! Form::number('metros_cuadrados', null, ['class' => 'form-control']) !!}
</div>

{!! Form::hidden('metros_cuadrados_terreno', 0, ['class' => 'form-control']) !!}

{{-- <!-- Metros Cuadrados Terreno Field -->
<div class="form-group col-sm-6">
    {!! Form::label('metros_cuadrados_terreno', 'Metros Cuadrados Terreno:') !!}
    {!! Form::hidden('metros_cuadrados_terreno', 0, ['class' => 'form-control']) !!}
</div> --}}

{!! Form::hidden('metros_cuadrados_terraza', 0, ['class' => 'form-control']) !!}

{{-- 
<!-- Metros Cuadrados Terraza Field -->
<div class="form-group col-sm-6">
    {!! Form::label('metros_cuadrados_terraza', 'Metros Cuadrados Terraza:') !!}
    {!! Form::number('metros_cuadrados_terraza', null, ['class' => 'form-control']) !!}
</div> --}}

<!-- Piscina Field -->
<div class="form-group col-sm-6">
    {!! Form::label('piscina', 'Piscina:') !!}
    {!! Form::select('piscina', ['1' => 'Si', '0' => 'No'], null, ['class' => 'form-control']) !!}
</div>

<!-- Jacuzzi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jacuzzi', 'Jacuzzi:') !!}
    {!! Form::select('jacuzzi', ['1' => 'Si', '0' => 'No'], null, ['class' => 'form-control']) !!}
</div>

<!-- Estacionamientos Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estacionamientos', 'Estacionamientos:') !!}
    {!! Form::select('estacionamientos', ['1' => 'Si', '0' => 'No'], null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::textarea('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Img Previsualizacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('img_previsualizacion', 'Imágen de Previsualizacion:') !!}
    {!! Form::file('img_previsualizacion') !!}
</div>

<!-- Img Previsualizacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('img_contenido', 'Imágenes de Contenido:') !!}
    {!! Form::file('img_contenido', ['multiple' => 'multiple', 'name' => 'img_contenido[]']) !!}
</div>
<div class="clearfix"></div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('proyectosPortal.index') }}" class="btn btn-light">Cancel</a>
</div>


@push('scriptsCustom')
    <script>
        $(document).ready(function(){ 
            $( "#categorias" ).select2();
            @if(isset($arrayCategorias))
                $('#categorias').val({{ $arrayCategorias }});
                $('#categorias').trigger('change');
            @endif
        });
    </script>
@endpush