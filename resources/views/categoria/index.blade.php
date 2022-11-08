@extends('layout.app')
@section('title','Listagem de Categorias')
@section('content')
    <h1>Listagem de Categorias</h1>
    @if(Session::has('mensagem'))
        <div class="alert alert-info">
            {{Session::get('mensagem')}}
        </div>
    @endif
    <div class="row">
        <div class="col-sm-3">
            <a class="btn btn-success" href="{{url('categoria/create')}}">Criar</a>
        </div>
        <div class="col-sm-9">
            <div class="input-group ml-5">
            </div>
        </div>
    </div>
    <br />
    <table class="table table-striped">
        @foreach ($categorias as $categoria)
            <tr>
                <td>
                    {{$categoria->genero}}
                </td>
            </tr>
        @endforeach
    </table>
@endsection