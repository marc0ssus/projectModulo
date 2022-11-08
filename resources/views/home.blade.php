@extends('layout.app')
@section('title','MÚSICAS')
@section('content')
<div class="card text-center">
  <div class="card-header">
    <h3><strong>Músicas</strong></h3>
  </div>
  <div class="card-body">
    <h5 class="card-title">Total de Músicas salvas:</h5>
    <p class="card-text">{{$numMusicas}}</p>
  </div>
  <div class="card-footer text-muted">
    Última atualização: {{$lastupMusicas}}
  </div>
</div>
<br><br>
<div class="card text-center">
  <div class="card-header">
    <h3><strong>Categorias</strong></h3>
  </div>
  <div class="card-body">
    <h5 class="card-title">Total de Categorias registradas:</h5>
    <p class="card-text">{{$numCategorias}}</p>
  </div>
  <div class="card-footer text-muted">
    Última atualização: {{$lastupCategorias}}
  </div>
</div>
@endsection