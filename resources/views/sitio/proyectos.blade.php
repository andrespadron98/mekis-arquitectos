@extends('sitio.base.app')
@section('contenido')
<div class="wrd-block project-sec">
    <div class="container-lg">
    <div class="row">
        <div class="col-12 col-sm-4 col-xl-3">
            <h2>Categoria</h2>
            <ul class="flex-column nav pl-4">
                <li class="nav-item position-relative">
                    <a style="cursor:pointer;" onclick="FiltroCategorias(null);" class="nav-link"> 
                        <img id="select_todos" src="assets/images/select.png" class="img-fluid select" alt="">
                        Todos
                    </a>
                </li>
                @foreach ($categorias as $row)
                    <li class="nav-item position-relative">
                        <a style="cursor:pointer;" onclick="FiltroCategorias({{ $row->id }});" class="nav-link">
                            <img id="select_{{ $row->id }}" src="assets/images/select.png" class="img-fluid select d-none" alt="">
                            {{ $row->nombre }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-12 col-sm-8 col-xl-9">
            <div class="row gallery-proyectos">
                @foreach ($proyectos as $row)
                    <div class="col-12 col-sm-4 col-lg-4 @foreach($row['categorias'] as $c) categoria_{{ $c['id_categoria'] }} @endforeach">
                        <div class="item item-gallery">
                            <a href="{{ route('proyectos', $row['id']."#desc") }}">
                                <img src="{{ asset("previsualizaciones/".$row['img_previsualizacion']) }}" alt="" />
                                <div class="img-title">{{ $row['nombre'] }}</div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
</div>
@endsection


@push('jsPersonalizado')
    <script>
        function FiltroCategorias(idCategorias){
            if(idCategorias){
                @foreach ($categorias as $row)
                    $('#select_{{ $row->id }}').addClass('d-none');
                    $('.categoria_{{ $row->id }}').addClass('d-none');
                @endforeach
                $('#select_todos').addClass('d-none');
                $('#select_'+idCategorias).removeClass('d-none');
                $('.categoria_'+idCategorias).removeClass('d-none');
            }else{
                $('#select_todos').removeClass('d-none');
                @foreach ($categorias as $row)
                    $('#select_{{ $row->id }}').addClass('d-none');
                    $('.categoria_{{ $row->id }}').removeClass('d-none');
                @endforeach
            }
        }
        $(document).ready(function(){ 
        });
    </script>
@endpush