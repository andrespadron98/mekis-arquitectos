<!-- Nombre Field -->
<div class="form-group col-sm-6">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $categorias->nombre ?? '') }}" class="form-control">
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <input type="submit" value="Save" class="btn btn-primary">
    <a href="{{ route('categorias.index') }}" class="btn btn-light">Cancel</a>
</div>
