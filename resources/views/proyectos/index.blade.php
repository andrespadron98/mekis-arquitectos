@extends('layouts.app')
@section('title')
    Proyectos 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Proyectos</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('proyectosPortal.create')}}" class="btn btn-primary form-btn">Proyectos <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('proyectos.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

