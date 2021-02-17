@extends('sitio.base.app')
@section('contenido')
<div class="wrd-block project-sec set-bg" data-setbg="../assets/images/bg-melkis.jpg" style="background-size: contain;">
    <div id="desc" class="container-lg">
        <div class="row">
            <div class="col-12 col-lg-5">
                <div class="pb-4">
                    <h1 class="font-weight-light">{{ $proyecto->nombre }}</h1>
                    <span>{{ $proyecto->comuna }} - {{ $proyecto->ciudad }}</span>
                </div>
                <p>{{ $proyecto->descripcion }}</p>
            </div>
            <div class="col-12 col-lg-7">
                <div class="container w-50">
                    <div class="row">
                        <div class="col-6 col-sm-4">
                            <img src="{{ asset('/assets/images/icons/bedrooms.png') }}" class="img-fluid" alt="">
                            <p class="text-center">{{ $proyecto->habitaciones }}<br><small>Habitaciones</small></p>
                        </div>
                        <div class="col-6 col-sm-4">
                            <img src="{{ asset('assets/images/icons/bathrooms.png') }}" class="img-fluid" alt="">
                            <p class="text-center">{{ $proyecto->banos }}<br><small>Baños</small></p>
                        </div>
                        <div class="col-6 col-sm-4">
                            <img src="{{ asset('assets/images/icons/constructed.png') }}" class="img-fluid" alt="">
                            <p class="text-center">{{ $proyecto->metros_cuadrados }} ㎡<br><small>Construcción</small></p>
                        </div>
                        <!--
                        <div class="col-6 col-sm-3">
                            <img src="{{ asset('assets/images/icons/plot-size.png') }}" class="img-fluid" alt="">
                            <p class="text-center">{{ $proyecto->metros_cuadrados_terreno }} ㎡<br><small>Terreno</small></p>
                        </div>
                        -->
                        @if ($proyecto->piscina === 1)
                            <div class="col-6 col-sm-4">
                                <img src="{{ asset('assets/images/icons/swimming.png') }}" class="img-fluid" alt="">
                                <p class="text-center"><small>Piscina</small></p>
                            </div>
                        @endif
                        <div class="col-6 col-sm-4">
                            <img src="{{ asset('assets/images/icons/terraces.png') }}" class="img-fluid" alt="">
                            <p class="text-center"><small>Terraza</small></p>
                        </div>
                        <!--
                        @if ($proyecto->jacuzzi === 1)
                            <div class="col-6 col-sm-3">
                                <img src="{{ asset('assets/images/icons/jacuzzi.png') }}" class="img-fluid" alt="">
                                <p class="text-center"><small>Jacuzzi</small></p>
                            </div>
                        @endif
                        -->
                        <div class="col-6 col-sm-4">
                            <img src="{{ asset('assets/images/icons/parking.png') }}" class="img-fluid" alt="">
                            <p class="text-center"><small>Estacionamientos</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pt-5 mt-4">
            <div class="owl-carousel owl-page owl-theme gallery-proyecto">
                @foreach ($imagenes as $row)
                    <div class="item">
                        <a href="{{ asset('contenido/'.$row->imagen) }}">
                            <img src="{{ asset('contenido/'.$row->imagen) }}" alt="" />
                            <div class="img-title">{{ $proyecto->nombre }}</div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
@push('jsPersonalizado')
    <script>
        $(document).ready(function(){ 
            $(".gallery-proyecto").magnificPopup({
                delegate: "a",
                type: "image",
                tLoading: "Loading image #%curr%...",
                mainClass: "mfp-img-mobile",
                gallery: {
                    enabled: true,
                    navigateByImgClick: true,
                    preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
                },
                image: {
                    tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
                }
            });
            $('.owl-page').owlCarousel({
                nav:true,
                    // autoWidth:true,
                center:false,
                margin: 10,
                loop:true,
                navText: ['<img src="{{ asset("assets/images/arrow-l.png") }}" width="32" alt="">', '<img src="{{ asset("assets/images/arrow-r.png") }}" width="32" alt="">'],
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:2
                    },
                    1000:{
                        items:3
                    }
                }
            });
        });
    </script>
@endpush