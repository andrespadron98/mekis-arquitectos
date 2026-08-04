@extends('sitio.base.app')
@section('contenido')
<div class="wrd-block prensa-sec set-bg" data-setbg="assets/images/bg-melkis.jpg" style="background-size: contain;">
    <div class="container container-lg">
        <h2 class="pl-4 ml-3">Escríbenos</h2>
        <div class="row p-5">
            <div class="col-12">
                @include('flash::message')
            </div>
        </div>
    </div>
</div>
@endsection
@push('jsPersonalizado')
<!-- Event snippet for Website traffic conversion page --> 
<script> gtag('event', 'conversion', {'send_to': 'AW-408466151/EgpVCJuK4fkBEOfl4sIB'}); </script>
@endpush