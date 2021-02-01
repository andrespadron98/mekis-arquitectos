@extends('sitio.base.app_index')
@section('contenido')
<div class="wrd-block set-bg index-sec" data-setbg="assets/images/bg-melkis.jpg">
    <div class="container-lg">
        <div class="paragraph">
            <div class="row align-items-center justify-content-center pb-4">
                <div class="col-8 text-left"><h2>Misión</h2></div>
                <div class="col-4 mt-lg-4 mt-sm-0 text-right"><a href="#">ver más</a></div>
            </div>
            <div class="row align-items-center justify-content-center w-75">
                <div class="col-auto">
                    <img src="assets/images/select.png" class="img-fluid select-paragraph" alt="">
                    <a href="#"><u>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate, adipisci neque aspernatur magnam.</u></a>  
                    <p class="mt-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia veritatis cumque ad ipsam, vel incidunt odio voluptatum, impedit, quod possimus consequuntur saepe nihil mollitia. Rerum error commodi beatae est officia.</p>
                </div>
            </div>
        </div>
        <div class="paragraph pt-5">
            <div class="row align-items-center justify-content-center pb-4">
                <div class="col-8 text-left"><h2>Visión</h2></div>
                <div class="col-4 mt-lg-4 mt-sm-0 text-right"><a href="#">ver más</a></div>
            </div>
            <div class="row align-items-center justify-content-center w-75">
                <div class="col-auto">
                    <img src="assets/images/select.png" class="img-fluid select-paragraph" alt="">
                    <a href="#"><u>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate, adipisci neque aspernatur magnam.</u></a>  
                    <p class="mt-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia veritatis cumque ad ipsam, vel incidunt odio voluptatum, impedit, quod possimus consequuntur saepe nihil mollitia. Rerum error commodi beatae est officia.</p>
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
        <div class="row gallery">
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