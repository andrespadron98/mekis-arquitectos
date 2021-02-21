<!doctype html>
<html lang="en">
    <head>
        <title>Andres Mekis</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/magnificpopup.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        
        @yield('cssPersonalizado')
    </head>
    <body>
        @include('sitio.base.top_menu')
        
        <div class="collapse-header header-pages is-visible">
            <div class="owl-header owl-carousel">
                <div class="background-header item set-bg filter" data-setbg="{{ asset('assets/images/'.$valores['img'][0]) }}"></div>
                <div class="background-header item set-bg filter" data-setbg="{{ asset('assets/images/'.$valores['img'][1]) }}"></div>
            </div>
        </div>
        
        <main class="content-section collapse-content content-pages is-visible">
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
                        titleSrc: function(item) {
                            return item.el.attr('title');
                        },
                        tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
                    }
                });
            });
        </script>
        @stack('jsPersonalizado')
    </body>
</html>