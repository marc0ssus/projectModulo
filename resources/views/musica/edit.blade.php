@extends('layout.app')
@section('title','Alteração da Música {{$musica->nome}}')
@section('content')
    <h1>Alteração de Música {{$musica->nome}}</h1>
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
    @if(Session::has('mensagem'))
        <div class="alert alert-success">
            {{Session::get('mensagem')}}
        </div>
    @endif
    <br />
    {{Form::open(['route' => ['musicas.update',$musica->id], 'method' => 'PUT','enctype'=>'multipart/form-data'])}}
        {{Form::label('nome', 'Nome')}}
        {{Form::text('nome','',['class'=>'form-control','required','placeholder'=>'Nome da música'])}}

        {{Form::label('banda', 'Banda')}}
        {{Form::text('banda','',['class'=>'form-control','required','placeholder'=>'Nome da banda'])}}

        {{Form::label('album', 'Álbum')}}
        {{Form::text('album','',['class'=>'form-control','required','placeholder'=>'Nome da álbum'])}}

        {{Form::label('genero', 'Gênero')}}
        {{Form::text('genero','',['class'=>'form-control','required','placeholder'=>'Selecione um gênero','list'=>'listcategorias'])}}
        <datalist id='listcategorias'>
            @foreach($categorias as $categoria)
                <option value="{{$categoria->id}}">{{$categoria->genero}}</option>
            @endforeach
        </datalist>

        {{Form::label('ano', 'Ano')}}
        {{Form::number('ano','',['class'=>'form-control','required','placeholder'=>'Ano de lançamento'])}}

        {{Form::label('foto', 'Foto')}}
        {{Form::file('foto',['class'=>'form-control','id'=>'foto'])}}
        <br />
        {{Form::submit('Salvar',['class'=>'btn btn-success'])}}
        <a href="{{url('/')}}" class="btn btn-secondary">Voltar</a>
    {{Form::close()}}
@endsection