@extends('layout.app')
@section('title','Adicionar nova Categoria')
@section('content')
<h1>Adicionar nova Categoria</h1>
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
    {{Form::open(['route' => 'categoria.store', 'method' => 'POST', 'enctype'=>'multipart/form-data'])}}
        {{Form::label('genero', 'Gênero')}}
        {{Form::text('genero','',['class'=>'form-control','required','placeholder'=>'Gênero de música'])}}
        <br />
        {{Form::submit('Salvar',['class'=>'btn btn-success'])}}
        {!!Form::button('Cancelar',['onclick'=>'javascript:history.go(-1)', 'class'=>'btn btn-secondary'])!!}
    {{Form::close()}}
@endsection