@extends('layout.app')
@section('title','MÚSICAS')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-11 bg-secondary text-light">
            <div class="fluid px-3 my-2 h4">{{ __('Dashboard de Quantidade') }}</div>
            <div class="row text-center h5">
                <div class="col m-3 bg-info text-light">
                    <div class="card-header p-2">Músicas</div>
                    <div class="card-body h1 p-5">
                        {{$nu}}
                    </div>
                </div>
                <div class="col m-3 bg-white text-black">
                    <div class="card-header p-2">Categorias</div>
                    <div class="card-body h1 p-5">
                        {{$numCategorias}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection