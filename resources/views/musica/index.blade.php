@extends('layout.app')
@section('title','Listagem de Músicas')
@section('content')
    <h1>Listagem de Músicas</h1>
    @if(Session::has('mensagem'))
        <div class="alert alert-info">
            {{Session::get('mensagem')}}
        </div>
    @endif
    <br />
    <table class="table table-striped">
        @foreach ($musicas as $musica)
            <tr>
                <td>
                    <a href="{{url('musicas/'.$musica->id)}}">{{$musica->nome}}</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection