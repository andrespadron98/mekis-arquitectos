@extends('sitio.base.app')
@section('contenido')
<div class="wrd-block inspiration-sec">
    <div class="container container-lg">
        <div class="row mx-2 text-center">
            {{-- <h3>Desde nuestros inicios, debido a la necesidad de satisfacer nuestras propias ideas arquitectónicas fuimos, progresivamente, tomando parte de cada una de las etapas constructivas teniendo especial interés en desarrollar la calidad, eficiencia y estudio de optimización de costos en cada una de ellas.</h3> --}}
            <p class="pt-5 mt-4 pb-5">Desde nuestros inicios, debido a la necesidad de satisfacer nuestras propias ideas arquitectónicas fuimos, progresivamente, tomando parte de cada una de las etapas constructivas teniendo especial interés en desarrollar la calidad, eficiencia y estudio de optimización de costos en cada una de ellas.</p>
        </div>
        <div class="container w-75">
            <div class="row text-center">
                <h2 class="py-4 text-center w-100">CHICUREO</h2>
                <div class="position-relative w-100">
                    <div class="sliderwide position-relative" style="height: 30rem;overflow: hidden;"><img src="assets/images/construcciones/img-chicureo-00-wide.png" class="img-fluid position-absolute" style="left: 0;"></div>
                    <div class="sliderwide position-relative" style="height: 30rem;overflow: hidden;"><img src="assets/images/construcciones/img-chicureo-00-wide.png" class="img-fluid position-absolute" style="left: 0;"></div>
                    <div class="sliderwide position-relative" style="height: 30rem;overflow: hidden;"><img src="assets/images/construcciones/img-chicureo-00-wide.png" class="img-fluid position-absolute" style="left: 0;"></div>
                    <div class="sliderwide position-relative" style="height: 30rem;overflow: hidden;"><img src="assets/images/construcciones/img-chicureo-00-wide.png" class="img-fluid position-absolute" style="left: 0;"></div>
                    <div class="sliderwide position-relative" style="height: 30rem;overflow: hidden;"><img src="assets/images/construcciones/img-chicureo-00-wide.png" class="img-fluid position-absolute" style="left: 0;"></div>
                    <div class="sliderwide position-relative" style="height: 30rem;overflow: hidden;"><img src="assets/images/construcciones/img-chicureo-00-wide.png" class="img-fluid position-absolute" style="left: 0;"></div>
                    <div class="sliderwide position-relative" style="height: 30rem;overflow: hidden;"><img src="assets/images/construcciones/img-chicureo-00-wide.png" class="img-fluid position-absolute" style="left: 0;"></div>
                    <div class="owl-page owl-carousel pt-1">
                        <div class="item"><img src="assets/images/construcciones/img-chicureo-00.png" class="img-fluid cursor-pointer" onclick="currentSlide(1)" alt=""></div>
                        <div class="item"><img src="assets/images/construcciones/img-chicureo-00.png" class="img-fluid cursor-pointer" onclick="currentSlide(2)" alt=""></div>
                        <div class="item"><img src="assets/images/construcciones/img-chicureo-00.png" class="img-fluid cursor-pointer" onclick="currentSlide(3)" alt=""></div>
                        <div class="item"><img src="assets/images/construcciones/img-chicureo-00.png" class="img-fluid cursor-pointer" onclick="currentSlide(4)" alt=""></div>
                        <div class="item"><img src="assets/images/construcciones/img-chicureo-00.png" class="img-fluid cursor-pointer" onclick="currentSlide(5)" alt=""></div>
                        <div class="item"><img src="assets/images/construcciones/img-chicureo-00.png" class="img-fluid cursor-pointer" onclick="currentSlide(6)" alt=""></div>
                        <div class="item"><img src="assets/images/construcciones/img-chicureo-00.png" class="img-fluid cursor-pointer" onclick="currentSlide(7)" alt=""></div>
                    </div>
                </div>
            </div>
            {{-- <div class="row text-center">
                <h2 class="py-4 text-center w-100">LA BARCA</h2>
                <div class="position-relative w-100">
                    <div class="sliderwide2"><img src="assets/images/construcciones/img-barca-00-wide.png" class="img-fluid"></div>
                    <div class="sliderwide2"><img src="assets/images/construcciones/img-barca-00-wide.png" class="img-fluid"></div>
                    <div class="sliderwide2"><img src="assets/images/construcciones/img-barca-00-wide.png" class="img-fluid"></div>
                    <div class="sliderwide2"><img src="assets/images/construcciones/img-barca-00-wide.png" class="img-fluid"></div>
                    <div class="sliderwide2"><img src="assets/images/construcciones/img-barca-00-wide.png" class="img-fluid"></div>
                    <div class="sliderwide2"><img src="assets/images/construcciones/img-barca-00-wide.png" class="img-fluid"></div>
                    <div class="sliderwide2"><img src="assets/images/construcciones/img-barca-00-wide.png" class="img-fluid"></div>
                    <div class="owl-page owl-carousel pt-1">
                        <div class="item"><img src="assets/images/construcciones/img-barca-00.png" class="img-fluid cursor-pointer" onclick="currentSlide2(1)" alt=""></div>
                        <div class="item"><img src="assets/images/construcciones/img-barca-00.png" class="img-fluid cursor-pointer" onclick="currentSlide2(2)" alt=""></div>
                        <div class="item"><img src="assets/images/construcciones/img-barca-00.png" class="img-fluid cursor-pointer" onclick="currentSlide2(3)" alt=""></div>
                        <div class="item"><img src="assets/images/construcciones/img-barca-00.png" class="img-fluid cursor-pointer" onclick="currentSlide2(4)" alt=""></div>
                        <div class="item"><img src="assets/images/construcciones/img-barca-00.png" class="img-fluid cursor-pointer" onclick="currentSlide2(5)" alt=""></div>
                        <div class="item"><img src="assets/images/construcciones/img-barca-00.png" class="img-fluid cursor-pointer" onclick="currentSlide2(6)" alt=""></div>
                        <div class="item"><img src="assets/images/construcciones/img-barca-00.png" class="img-fluid cursor-pointer" onclick="currentSlide2(7)" alt=""></div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>
@endsection
@push('jsPersonalizado')
    <script>
        $(document).ready(function ($) {
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
        });
    </script>
    <script>
        var slideIndex = 1;
        var slide2Index = 1;
        showSlides(slideIndex);
        showSlides2(slide2Index);

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function currentSlide2(n) {
            showSlides2(slide2Index = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("sliderwide");
            if (n > slides.length) {slideIndex = 1}
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slides[slideIndex-1].style.display = "block";
        }

        function showSlides2(n) {
            var i;
            var slides2 = document.getElementsByClassName("sliderwide2");
            if (n > slides2.length) {slide2Index = 1}
            if (n < 1) {slide2Index = slides2.length}
            for (i = 0; i < slides2.length; i++) {
                slides2[i].style.display = "none";
            }
            slides2[slide2Index-1].style.display = "block";
        }
    </script>
    <script>
        $(document).ready(function ($) {
            $('.owl-page').owlCarousel({
                loop:false,
                // autoWidth:true,
                nav:true,
                center:false,
                margin: 5,
                navText: ['<img src="assets/images/arrow-l.png" width="32" alt="">', '<img src="assets/images/arrow-r.png" width="32" alt="">'],
                responsive:{
                    0:{
                        items:3
                    },
                    600:{
                        items:5
                    },
                    1000:{
                        items:5
                    }
                }
            });
        });
    </script>
@endpush