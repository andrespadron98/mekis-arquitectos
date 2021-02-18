@extends('layouts.app')
@section('title')
    Tipos Proyectos 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Tipos Proyectos</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('tiposProyectos.create')}}" class="btn btn-primary form-btn">Tipos Proyectos <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('tipos_proyectos.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

