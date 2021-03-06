@extends('painel.templates.template')

@section('content')
    <h1 class="title-pg">
        <a href="{{route('produtos.index')}}">
            <span class="glyphicon glyphicon-fast-backward"></span>
        </a>
        Gestão Produto: <b>{{$product->name or 'Novo'}}</b>
    </h1>
    @if(isset($errors) && count($errors)>0)
        <div class="alert alert-danger">
          @foreach($errors->all() as $error)
              <p>{{$error}}</p>
          @endforeach
        </div>
    @endif
    @if(isset($product))
        {!! Form::model($product, ['route' => ['produtos.update', $product->id], 'method' => 'put', 'class' => 'form']) !!}
    @else
        {!! Form::open(['route' => 'produtos.store', 'class' => 'form']) !!}
    @endif
        <div class="form-group">
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome:']) !!}
        </div>
        <div class="form-group">
            <label>
                {!! Form::checkbox('active')!!}
                Ativo?
            </label>
        </div>
        <div class="form-group">
            <input type="text" name="number" placeholder="Número:" class="form-control" value="{{$product->number or old('number')}}">
        </div>
        <div class="form-group">
            {!! Form::select('category', $categories, null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Descrição']) !!}
        </div>
        {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}

@endsection
