<!doctype html>
<html lang="es">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        @include('sitio.base.seo')

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        {{-- Google pide /favicon.ico en la raiz y exige que sea cuadrado. La que
             habia estaba vacia (0 bytes) y la otra media 221x152, por eso el
             buscador mostraba el icono generico. --}}
        <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicon-32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon-16.png') }}">
        <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">

        {{-- El fondo del header es lo primero que se ve: se precarga con
             prioridad alta para que empiece a bajar junto con el HTML. --}}
        <link rel="preload" as="image" fetchpriority="high" href="{{ asset('assets/images/a.jpeg') }}">
        {{-- Los CSS y el jQuery vienen de tres dominios distintos; abrir la
             conexion por adelantado ahorra el DNS y el TLS de cada uno. --}}
        <link rel="preconnect" href="https://stackpath.bootstrapcdn.com" crossorigin>
        <link rel="preconnect" href="https://code.jquery.com" crossorigin>
        <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>

        <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/magnificpopup.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        
        @yield('cssPersonalizado')
        
        <!-- Global site tag (gtag.js) - Google Ads: 408466151 --> 
        <script async src="https://www.googletagmanager.com/gtag/js?id=AW-408466151"></script> 
        <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'AW-408466151'); </script>

    </head>
    <body>
        @include('sitio.base.top_menu_index')
        
        <div class="collapse-header header-index">
            <div class="owl-header owl-carousel">
                {{-- El primer slide se pinta aqui y no con set-bg: main.js va al
                     final del documento, asi que pintarlo por JS obligaba a
                     esperar jquery, popper, bootstrap y magnificpopup antes de
                     siquiera pedir la imagen. Los otros cuatro pueden seguir por
                     JS porque no se ven hasta que rota el carrusel. --}}
                <div class="background-header item filter" style="background-image: url('{{ asset('assets/images/a.jpeg') }}')"></div>
                <div class="background-header item set-bg filter" data-setbg="assets/images/b.jpeg"></div>
                <div class="background-header item set-bg filter" data-setbg="assets/images/c.jpeg"></div>
                <div class="background-header item set-bg filter" data-setbg="assets/images/d.jpeg"></div>
                <div class="background-header item set-bg filter" data-setbg="assets/images/e.jpeg"></div>
            </div>
        </div>

        {{-- <div id="background-header" class="collapse-header header-index set-bg" data-setbg="assets/images/header-0.png"></div> --}}
        
        <main class="content-section collapse-content content-index">
        {{-- El diseno no trae un titulo de primer nivel visible (los rotulos del
             hero son h2 repetidos para movil y escritorio). Se emite uno accesible
             para buscadores y lectores de pantalla, sin alterar la maqueta. --}}
        @hasSection('h1')
            <h1 class="sr-only">@yield('h1')</h1>
        @endif
            @yield('contenido')
            @include('sitio.base.footer')
        </main>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="{{ asset('assets/js/magnificpopup.js') }}"></script>
        <script src="{{ asset('assets/js/main.js') }}"></script>
        <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
        <script>
            $(document).ready(function ($) {
                $('.owl-header').owlCarousel({
                    loop: true,
                    nav: false,
                    dots: false,
                    mouseDrag: true,
                    animateOut: 'fadeOut',
                    animateIn: 'fadeIn',
                    items: 1,
                    autoplay: true
                });
                $(".gallery").magnificPopup({
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
                var scrolable = true;
                $(window).scroll(function (event) {
                    var scroll = $(window).scrollTop();
                    if(scrolable === true && scroll > 1){
                        ComprimirDescomprimirMenu();
                        scrolable = false;
                    }
                });
            });

            function ComprimirDescomprimirMenu(){
                $('.menu-icon').toggleClass('is-clicked');
                if( $('.collapse-nav').hasClass('is-visible') ) {
                    $('.collapse-nav').removeClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend');
                } else {
                    $('.collapse-nav').addClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend');	
                }

                if( $('.no-collapse-nav').hasClass('is-visible') ) {
                    $('.no-collapse-nav').removeClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend');
                } else {
                    $('.no-collapse-nav').addClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend');	
                }

                if( $('.no-collapse-title, .collapse-title').hasClass('is-visible') ) {
                    $('.no-collapse-title, .collapse-title').removeClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend');
                } else {
                    $('.no-collapse-title, .collapse-title').addClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend');	
                }

                if( $('.collapse-header, .collapse-content').hasClass('is-visible') ) {
                    $('.collapse-header, .collapse-content').removeClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend');
                } else {
                    $('.collapse-header, .collapse-content').addClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend');	
                }
            }
        </script>
        @stack('jsPersonalizado')
    </body>
</html>