@extends('layout.app')
@section('title','Adicionar nova Música')
@section('content')
<h1>Adicionar nova Música</h1>
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
<br />
    {{Form::open(['route' => 'musicas.store', 'method' => 'POST'])}}
        {{Form::label('nome', 'Nome')}}
        {{Form::text('nome','',['class'=>'form-control','required','placeholder'=>'Nome da música'])}}

        {{Form::label('banda', 'Banda')}}
        {{Form::text('banda','',['class'=>'form-control','required','placeholder'=>'Nome da banda'])}}

        {{Form::label('album', 'Álbum')}}
        {{Form::text('album','',['class'=>'form-control','required','placeholder'=>'Nome da álbum'])}}

        {{Form::label('genero', 'Gênero')}}
        {{Form::text('genero','',['class'=>'form-control','required','placeholder'=>'Nome do gênero'])}}

        {{Form::label('ano', 'Ano')}}
        {{Form::number('ano','',['class'=>'form-control','required','placeholder'=>'Ano de lançamento'])}}

        {{Form::label('foto', 'Foto')}}
        {{Form::file('foto',['class'=>'form-control','id'=>'foto'])}}
        <br />
        {{Form::submit('Salvar',['class'=>'btn btn-success'])}}
        {!!Form::button('Cancelar',['onclick'=>'javascript:history.go(-1)', 'class'=>'btn btn-secondary'])!!}
    {{Form::close()}}
@endsection