@extends('layouts.app')
@section('title')
    Create Proyectos 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading m-0">New Proyectos</h3>
            <div class="filter-container section-header-breadcrumb row justify-content-md-end">
                <a href="{{ route('proyectosPortal.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
        <div class="content">
            @include('common.errors')
            <div class="section-body">
               <div class="row">
                   <div class="col-lg-12">
                       <div class="card">
                           <div class="card-body ">
                                <form action="{{ route('proyectosPortal.store') }}" method="POST" enctype="multipart/form-data">
@csrf
                                    <div class="row">
                                        @include('proyectos.fields')
                                    </div>
                                </form>
                           </div>
                       </div>
                   </div>
               </div>
            </div>
        </div>
    </section>
@endsection
