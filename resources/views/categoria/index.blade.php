@extends('layout.app')
@section('title','Listagem de Categorias')
@section('content')
    <h1>Listagem de Categorias</h1>
    @if(Session::has('mensagem'))
        <div class="alert alert-info">
            {{Session::get('mensagem')}}
        </div>
    @endif
    <br />
    <table class="table table-striped">
        @foreach ($categorias as $categoria)
            <tr>
                <td>
                    <a href="{{url('categorias/'.$categoria->id)}}">{{$categoria->genero}}</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection