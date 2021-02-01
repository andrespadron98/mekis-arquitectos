@extends('sitio.base.app')
@section('contenido')
<div class="wrd-block prensa-sec pb-0">
    <div class="container container-lg">
        <div class="row">
            <div class="col-12 col-lg-4">
                <img src="assets/images/nosotros/img-since.png" class="img-fluid" alt="">
            </div>
            <div class="col-12 col-lg-8 pt-4 pt-lg-0 pl-4">
                <p class="font-weight-light">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempore, necessitatibus. Id modi molestiae quod quibusdam recusandae quasi, consequuntur iusto nulla consectetur architecto inventore. Temporibus quo voluptas enim, ratione ipsam hic!</p>
                <p class="font-weight-bold">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempore, necessitatibus. Id modi molestiae quod quibusdam recusandae quasi.</p>
                <p class="font-weight-bold">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempore, necessitatibus.</p>
            </div>
        </div>
    </div>
</div>
<div class="wrd-block prensa-sec py-0">
    <div class="container container-lg">
        <h1 class="text-left py-5">EQUIPO</h1>
        <div class="row">
            <div class="col-12 col-lg-4">
                <img src="assets/images/nosotros/img-team.png" class="img-fluid" alt="">
            </div>
            <div class="col-12 col-lg-8 pt-4 pt-sm-0 pl-0 pl-sm-4 text-center text-sm-left">
                <h2 class="mb-0">Andres Mekis</h2>
                <p><small>2020 - Universidad Andres</small></p>
                <p class="font-weight-light">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempore, necessitatibus. Id modi molestiae quod quibusdam recusandae quasi, consequuntur iusto nulla consectetur architecto inventore.</p>
                <p class="font-weight-bold">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempore, necessitatibus. Id modi molestiae quod quibusdam recusandae quasi.</p>
                <p class="font-weight-bold">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempore, necessitatibus.</p>
            </div>
        </div>
        <div class="row pt-4">
            <div class="col-12 col-lg-4">
                <img src="assets/images/nosotros/img-team.png" class="img-fluid" alt="">
            </div>
            <div class="col-12 col-lg-8 pt-4 pt-sm-0 pl-0 pl-sm-4 text-center text-sm-left">
                <h2 class="mb-0">Andres Mekis</h2>
                <p><small>2020 - Universidad Andres</small></p>
                <p class="font-weight-light">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempore, necessitatibus. Id modi molestiae quod quibusdam recusandae quasi, consequuntur iusto nulla consectetur architecto inventore.</p>
                <p class="font-weight-bold">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempore, necessitatibus. Id modi molestiae quod quibusdam recusandae quasi.</p>
                <p class="font-weight-bold">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempore, necessitatibus.</p>
            </div>
        </div>
        <div class="row pt-4">
            <div class="col-12 col-lg-4">
                <img src="assets/images/nosotros/img-team.png" class="img-fluid" alt="">
            </div>
            <div class="col-12 col-lg-8 pt-4 pt-sm-0 pl-0 pl-sm-4 text-center text-sm-left">
                <h2 class="mb-0">Andres Mekis</h2>
                <p><small>2020 - Universidad Andres</small></p>
                <p class="font-weight-light">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempore, necessitatibus. Id modi molestiae quod quibusdam recusandae quasi, consequuntur iusto nulla consectetur architecto inventore.</p>
                <p class="font-weight-bold">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempore, necessitatibus. Id modi molestiae quod quibusdam recusandae quasi.</p>
                <p class="font-weight-bold">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempore, necessitatibus.</p>
            </div>
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
@endpush