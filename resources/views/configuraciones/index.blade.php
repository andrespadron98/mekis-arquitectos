@extends('layouts.app')
@section('title')
    Configuraciones 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Configuraciones</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('configuraciones.create')}}" class="btn btn-primary form-btn">Configuraciones <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('configuraciones.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

