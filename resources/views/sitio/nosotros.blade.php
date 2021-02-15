@extends('sitio.base.app')
@section('contenido')
<div class="wrd-block prensa-sec py-0 set-bg" data-setbg="assets/images/bg-melkis.jpg" style="background-size: contain;">
    <div class="container container-lg">
        <h1 class="text-left py-5">EQUIPO</h1>
        <div class="row">
            <div class="col-12 col-lg-4 px-3">
                <img src="assets/images/nosotros/andres.jpeg" class="img-fluid" alt="">
                <div class="pt-4">
                    <h2 class="mb-0">Andrés Mekis</h2>
                    <p><small>1988 - Arquitecto Universidad de Chile.</small></p>
                    <p class="font-weight-light">Se radicó en Paris entre los años 1988-1992, colabora en la oficina del destacado arquitecto Emile Duhart en Paris. Fue en Francia en donde despierta el interés por la arquitectura Provenzal con un aporte personal en su propia interpretación. </p>
                    <p class="font-weight-bold">De vuelta en Chile en 1993 forma junto a su hermano arquitecto Felipe el estudio” Mekis arquitectos” con quien comparte equipo hasta 2008. Desde entonces ha desarrollado continuamente proyectos arquitectónicos lo largo de Chile.</p>
                </div>
            </div>
            <div class="col-12 col-lg-4 px-3">
                <img src="assets/images/nosotros/leon.jpg" class="img-fluid" alt="">
                <div class="pt-4">
                    <h2 class="mb-0">León Mekis</h2>
                    <p><small>2020 - Arquitecto UNAB.</small></p>
                    <p class="font-weight-light">Desde temprana edad trabajó en la constructora y estudio de su padre arquitecto, en este involucramiento continuo en el desarrollo de proyectos y obras ejecutadas en Mekis arquitectos durante toda su carrera, lo que deja en él una enriquecedora experiencia en terreno. Estudió su última etapa universitaria en la Universidad Europea de Valencia, España.</p>
                    {{-- <p class="font-weight-bold">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempore, necessitatibus. Id modi molestiae quod quibusdam recusandae quasi.</p> --}}
                </div>
            </div>
            <div class="col-12 col-lg-4 px-3">
                <img src="assets/images/nosotros/pablo.jpg" class="img-fluid" alt="">
                <div class="pt-4">
                    <h2 class="mb-0">Pablo Parra</h2>
                    <p><small>2014 - Arquitecto Universidad Politécnica de Valencia, España.</small></p>
                    <p class="font-weight-light">De Albacete, España. Durante un año trabajó como arquitecto de departamentos en Shanghái, China. Donde se destaca su fascinación por la arquitectura y paisajismo oriental.</p>
                    <p class="font-weight-bold">Forma equipo de Mekis arquitectos desde el 2016 aportando sus conocimientos culturales y software BIM como Revit y en visualización arquitectónica para optimizar los tiempos de trabajo a la vez de facilitar la compresión de los proyectos a los clientes.</p>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="wrd-block prensa-sec pb-0">
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
</div> --}}
@endsection
@push('jsPersonalizado')
@endpush