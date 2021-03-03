@extends('sitio.base.app')
@section('contenido')
<div class="wrd-block prensa-sec set-bg" data-setbg="assets/images/bg-melkis.jpg" style="background-size: contain;">
    <div class="container container-lg">

        {!! Form::open(['route' => 'contactos.store']) !!}
            <h2 class="pl-4 ml-3">Escríbenos</h2>
            <div class="row p-5">
                <div class="col-12">
                    @include('stisla-templates::common.errors')
                    @include('flash::message')
                </div>
                <div class="col-md-6">
                    <div class="form-group p-2">
                        {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre']) !!}
                    </div>
                    <div class="form-group p-2">
                        {!! Form::text('correo', null, ['class' => 'form-control', 'placeholder' => 'Correo Electrónico']) !!}
                    </div>
                    <div class="form-group p-2">
                        {!! Form::text('celular', null, ['class' => 'form-control', 'placeholder' => 'Celular']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group p-2">
                        {!! Form::textarea('cuentanos', null, ['class' => 'form-control', 'placeholder' => 'Cuentanos de tu proyecto', 'style' => 'width: 100%; height: 175px;']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group p-2">
                        {!! Form::submit('Enviar Mensaje', ['class' => 'btn btn-dark rounded-0']) !!}
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
@push('jsPersonalizado')
@endpush