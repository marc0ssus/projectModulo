@extends('layout.app')
@section('title','Música - '.$musica->nome)
@section('content')
    <div class="card w-50 m-auto">
        @php
            $nomeimagem = "";
            if(file_exists("./img/musicas/".md5($musica->id).".jpg")) {
                $nomeimagem = "./img/musicas/".md5($musica->id).".jpg";
            } elseif (file_exists("./img/musicas/".md5($musica->id).".png")) {
                $nomeimagem = "./img/musicas/".md5($musica->id).".png";
            } elseif (file_exists("./img/musicas/".md5($musica->id).".gif")) {
                $nomeimagem =  "./img/musicas/".md5($musica->id).".gif";
            } elseif (file_exists("./img/musicas/".md5($musica->id).".webp")) {
                $nomeimagem = "./img/musicas/".md5($musica->id).".webp";
            } elseif (file_exists("./img/musicas/".md5($musica->id).".jpeg")) {
                $nomeimagem = "./img/musicas/".md5($musica->id).".jpeg";
            } else {
                $nomeimagem = "./img/musicas/imagemsemfoto.png";
            }

            $nomeaudio = "";
            if(file_exists("./audio/".md5($musica->id).".mp3")) {
                $nomeaudio = "./audio/".md5($musica->id).".mp3";
            } elseif (file_exists("./audio/".md5($musica->id).".ogg")) {
                $nomeaudio = "./audio/".md5($musica->id).".ogg";
            } elseif (file_exists("./audio/".md5($musica->id).".wav")) {
                $nomeaudio =  "./audio/".md5($musica->id).".wav";
            }
        @endphp

        {{Html::image(asset($nomeimagem),'Foto de '.$musica->nome,["class"=>"img-thumbnail w-75 mx-auto d-block"])}}
        <br>
        <div style="text-align:center">
            <audio controls >
                <source src="{{asset($nomeaudio)}}" type="audio/mpeg">
                <source src="{{asset($nomeaudio)}}" type="audio/ogg">
                <source src="{{asset($nomeaudio)}}" type="audio/wav">
            </audio>
        </div>
        <br>
        <div class="card-header">
            <h1>Música - {{$musica->nome}}</h1>
        </div>
        <div class="card-body">
                <h3 class="card-title">ID: {{$musica->id}}</h3>
                <p class="text">
                Nome: {{$musica->nome}}<br/>
                Banda: {{$musica->banda}}<br/>
                Álbum: {{$musica->album}}<br/>
                Gênero: {{$musica->categoria->genero}}<br/>
                Ano: {{$musica->ano}}</p>
        </div>
        <div class="card-footer">
                {{Form::open(['route' => ['musicas.destroy',$musica->id],'method' => 'DELETE'])}}
                @if ($nomeimagem !== "./img/musicas/musicasemfoto.webp")
                {{Form::hidden('foto',$nomeimagem)}}
                @endif
                <a href="{{url('musicas/'.$musica->id.'/edit')}}" class="btn btn-success">Alterar</a>
                {{Form::submit('Excluir',['class'=>'btn btn-danger','onclick'=>'return confirm("Confirma exclusão?")'])}}
            <a href="{{url('musicas/')}}" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
    <br />
@endsection