<!-- Nombre Field -->
<div class="form-group col-sm-6">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $proyectos->nombre ?? '') }}" class="form-control">
</div>

<!-- Categorias Field -->
<div class="form-group col-sm-6">
    <label for="categorias">Categorias:</label>
    <select name="categorias[]" id="categorias" class="form-control" multiple="multiple">
        @foreach($categoriasItems as $__k => $__v)
            <option value="{{ $__k }}">{{ $__v }}</option>
        @endforeach
    </select>
</div>

<!-- Tipo Proyecto Field -->
<div class="form-group col-sm-6">
    <label for="tipo">Tipo de Proyecto:</label>
    <select name="tipo" id="tipo" class="form-control">
        @foreach($tiposItems as $__k => $__v)
            <option value="{{ $__k }}" {{ old('tipo', $proyectos->tipo ?? '') == $__k ? 'selected' : '' }}>{{ $__v }}</option>
        @endforeach
    </select>
</div>

<!-- Comuna Field -->
<div class="form-group col-sm-6">
    <label for="comuna">Comuna:</label>
    <input type="text" name="comuna" id="comuna" value="{{ old('comuna', $proyectos->comuna ?? '') }}" class="form-control">
</div>

<!-- Ciudad Field -->
<div class="form-group col-sm-6">
    <label for="ciudad">Ciudad:</label>
    <input type="text" name="ciudad" id="ciudad" value="{{ old('ciudad', $proyectos->ciudad ?? '') }}" class="form-control">
</div>


<!-- Habitaciones Field -->
<div class="form-group col-sm-6">
    <label for="habitaciones">Habitaciones:</label>
    <input type="number" name="habitaciones" id="habitaciones" value="{{ old('habitaciones', $proyectos->habitaciones ?? '') }}" class="form-control">
</div>

<!-- banos Field -->
<div class="form-group col-sm-6">
    <label for="banos">Baños:</label>
    <input type="number" name="banos" id="banos" value="{{ old('banos', $proyectos->banos ?? '') }}" class="form-control">
</div>

<!-- metros_cuadrados Field -->
<div class="form-group col-sm-6">
    <label for="metros_cuadrados">Metros Cuadrados Construcción:</label>
    <input type="number" name="metros_cuadrados" id="metros_cuadrados" value="{{ old('metros_cuadrados', $proyectos->metros_cuadrados ?? '') }}" class="form-control">
</div>

<input type="hidden" name="metros_cuadrados_terreno" id="metros_cuadrados_terreno" value="0" class="form-control">

{{-- <!-- Metros Cuadrados Terreno Field -->
<div class="form-group col-sm-6">
    <label for="metros_cuadrados_terreno">Metros Cuadrados Terreno:</label>
    <input type="hidden" name="metros_cuadrados_terreno" id="metros_cuadrados_terreno" value="0" class="form-control">
</div> --}}

<input type="hidden" name="metros_cuadrados_terraza" id="metros_cuadrados_terraza" value="0" class="form-control">

{{-- 
<!-- Metros Cuadrados Terraza Field -->
<div class="form-group col-sm-6">
    <label for="metros_cuadrados_terraza">Metros Cuadrados Terraza:</label>
    <input type="number" name="metros_cuadrados_terraza" id="metros_cuadrados_terraza" value="{{ old('metros_cuadrados_terraza', $proyectos->metros_cuadrados_terraza ?? '') }}" class="form-control">
</div> --}}

<!-- Piscina Field -->
<div class="form-group col-sm-6">
    <label for="piscina">Piscina:</label>
    <select name="piscina" id="piscina" class="form-control">
        @foreach(['1' => 'Si', '0' => 'No'] as $__k => $__v)
            <option value="{{ $__k }}" {{ old('piscina', $proyectos->piscina ?? '') == $__k ? 'selected' : '' }}>{{ $__v }}</option>
        @endforeach
    </select>
</div>

<!-- Jacuzzi Field -->
<div class="form-group col-sm-6">
    <label for="jacuzzi">Jacuzzi:</label>
    <select name="jacuzzi" id="jacuzzi" class="form-control">
        @foreach(['1' => 'Si', '0' => 'No'] as $__k => $__v)
            <option value="{{ $__k }}" {{ old('jacuzzi', $proyectos->jacuzzi ?? '') == $__k ? 'selected' : '' }}>{{ $__v }}</option>
        @endforeach
    </select>
</div>

<!-- Estacionamientos Field -->
<div class="form-group col-sm-6">
    <label for="estacionamientos">Estacionamientos:</label>
    <select name="estacionamientos" id="estacionamientos" class="form-control">
        @foreach(['1' => 'Si', '0' => 'No'] as $__k => $__v)
            <option value="{{ $__k }}" {{ old('estacionamientos', $proyectos->estacionamientos ?? '') == $__k ? 'selected' : '' }}>{{ $__v }}</option>
        @endforeach
    </select>
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-12 col-lg-12">
    <label for="descripcion">Descripcion:</label>
    <textarea name="descripcion" id="descripcion" class="form-control">{{ old('descripcion', $proyectos->descripcion ?? '') }}</textarea>
</div>

<!-- Img Previsualizacion Field -->
<div class="form-group col-sm-6">
    <label for="img_previsualizacion">Imágen de Previsualizacion:</label>
    <input type="file" name="img_previsualizacion" id="img_previsualizacion">
</div>

<!-- Img Previsualizacion Field -->
<div class="form-group col-sm-6">
    <label for="img_contenido">Imágenes de Contenido:</label>
    <input type="file" name="img_contenido[]" id="img_contenido" multiple="multiple">
</div>
<div class="clearfix"></div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <input type="submit" value="Save" class="btn btn-primary">
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