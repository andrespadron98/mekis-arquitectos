@extends('sitio.base.app')
@section('contenido')
<div class="wrd-block prensa-sec set-bg" data-setbg="assets/images/bg-melkis.jpg" style="background-size: contain;">
    <div class="container container-lg">

        <form action="{{ route('contactos.store') }}" method="POST">
@csrf
            <h2 class="pl-4 ml-3">Escríbenos</h2>
            <div class="row p-5">
                <div class="col-12">
                    @include('common.errors')
                    @include('flash::message')
                </div>
                <div class="col-md-6">
                    <div class="form-group p-2">
                        <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" class="form-control" placeholder="Nombre">
                    </div>
                    <div class="form-group p-2">
                        <input type="text" name="correo" id="correo" value="{{ old('correo') }}" class="form-control" placeholder="Correo Electrónico">
                    </div>
                    <div class="form-group p-2">
                        <input type="text" name="celular" id="celular" value="{{ old('celular') }}" class="form-control" placeholder="Celular">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group p-2">
                        <textarea name="cuentanos" id="cuentanos" class="form-control" placeholder="Cuentanos de tu proyecto" style="width: 100%; height: 175px;">{{ old('cuentanos') }}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group p-2">
                        <input type="submit" value="Enviar Mensaje" class="btn btn-dark rounded-0">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@push('jsPersonalizado')
@endpush