@extends('painel.templates.template')

@section('content')
    <h1 class="title-pg">
        <a href="{{route('produtos.index')}}">
            <span class="glyphicon glyphicon-fast-backward"></span>
        </a>
        Visualizando Produto: <b>{{$product->name}}</b>
    </h1>
    <hr>

    @if(isset($errors) && count($errors)>0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>
    @endif

    <p><b>Nome: </b>{{$product->name}}</p>
    <p><b>Número: </b>{{$product->number}}</p>
    <p><b>Categoria: </b>{{$product->category}}</p>
    <p><b>Descrição: </b>{{$product->description}}</p>

    {!! Form::open(['route' => ['produtos.destroy', $product->id], 'method' => 'delete']) !!}
    {!! Form::submit("Deletar: $product->name", ['class' => 'btn btn-danger']) !!}

@endsection
