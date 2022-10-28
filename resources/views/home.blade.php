@extends('layout.app')
@section('title','Catálogo de Músicas')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-11 bg-secondary text-light">
            <div class="fluid px-3 my-2 h4">{{ __('Dashboard') }}</div>
            <div class="row text-center h5">
                <div class="col m-3 bg-info text-light">
                    <div class="card-header p-2">Músicas</div>
                </div>
                <div class="col m-3 bg-white text-black">
                    <div class="card-header p-2">Categorias</div>
                </div>
            </div>
        </div>
    </div>
@endsection