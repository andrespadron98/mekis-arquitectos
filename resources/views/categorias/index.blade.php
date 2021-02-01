@extends('layouts.app')
@section('title')
    Categorias 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Categorias</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('categorias.create')}}" class="btn btn-primary form-btn">Categorias <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('categorias.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

