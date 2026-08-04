<!-- Nombre Field -->
<div class="form-group col-sm-6">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $contactos->nombre ?? '') }}" class="form-control">
</div>

<!-- Celular Field -->
<div class="form-group col-sm-6">
    <label for="celular">Celular:</label>
    <input type="text" name="celular" id="celular" value="{{ old('celular', $contactos->celular ?? '') }}" class="form-control">
</div>

<!-- Correo Field -->
<div class="form-group col-sm-6">
    <label for="correo">Correo:</label>
    <input type="text" name="correo" id="correo" value="{{ old('correo', $contactos->correo ?? '') }}" class="form-control">
</div>

<!-- Cuentanos Field -->
<div class="form-group col-sm-12 col-lg-12">
    <label for="cuentanos">Cuentanos:</label>
    <textarea name="cuentanos" id="cuentanos" class="form-control">{{ old('cuentanos', $contactos->cuentanos ?? '') }}</textarea>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <input type="submit" value="Save" class="btn btn-primary">
    <a href="{{ route('contactos.index') }}" class="btn btn-light">Cancel</a>
</div>
