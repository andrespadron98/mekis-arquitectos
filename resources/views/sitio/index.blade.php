@extends('sitio.base.app_index')
@section('contenido')
<div class="wrd-block set-bg index-sec" data-setbg="assets/images/bg-melkis.jpg">
    <div class="container-lg">
        <div class="paragraph pt-5">
            <div class="row align-items-center justify-content-center pb-4">
                <div class="col-8 text-left"><h2>Nosotros</h2></div>
                <div class="col-4 mt-lg-4 mt-sm-0 text-right"><a href="{{ route('nosotros') }}">ver más</a></div>
            </div>
            <div class="row align-items-center justify-content-center w-75">
                <div class="col-auto">
                    {{-- <img src="assets/images/select.png" class="img-fluid select-paragraph" alt=""> --}}
                    {{-- <a href="#"><u>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate, adipisci neque aspernatur magnam.</u></a>   --}}
                    <p class="mt-4">Desde el año 1993 hemos desarrollado Viviendas, Remodelaciones, Restaurantes y Oficinas, desarrollado proyectos de arquitectura contemporánea y clásica incluyendo la calidez que caracteriza nuestras propuestas, fiel en mantener el principio de proyectar una obra para que otros puedan ser felices en ella.</p> 
                    <p>La respuesta arquitectónica es fruto de las variables que el mundo requiere, es por esto que en nuestros encargos estamos comprometidos en dar respuesta a los requerimientos en cada uno de ellos, siempre manteniendo conciencia en los costos y la armonía en nuestros proyectos desde su concepción.</p>
                    <p>Nos propusimos como oficina satisfacer todas las variadas necesidades que nuestros clientes nos encargan, es por esto que la mayoría de nuestros proyectos abarcan desde la selección del lugar, diseño arquitectónico del proyecto, hasta la construcción final de la obra.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="wrd-block">
    <div class="container-lg">
        <div class="row align-items-center justify-content-center pb-4">
            <div class="col-6 text-left"><h1>Proyectos</h1></div>
            <div class="col-6 mt-4 mt-sm-0 text-right link"><a href="{{ route('proyecto') }}">TODOS LOS PROYECTOS <img src="assets/images/select.png" class="img-fluid select-paragraph" alt=""></a></div>
        </div>
        <div class="row gallery-index">
            @foreach ($proyectos as $row)
                <div class="col-12 col-md-4">
                    <div class="item">
                        <a href="{{ route('proyectos', $row->id) }}">
                            <img src="{{ asset("previsualizaciones/".$row->img_previsualizacion) }}" alt="" />
                            <div class="img-title">{{ $row->nombre }}</div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
@push('jsPersonalizado')
@endpush