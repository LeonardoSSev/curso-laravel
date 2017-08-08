@extends('painel.templates.template')

@section('content')
    <h1 class="title-pg">Gestão Produto</h1>
    @if(isset($errors) && count($errors)>0)
        <div class="alert alert-danger">
          @foreach($errors->all() as $error)
              <p>{{$error}}</p>
          @endforeach
        </div>
    @endif
    @if(isset($product))
        <form action="{{route('produtos.update', $product->id)}}" method="POST" class="form">
            {!! method_field('PUT') !!}
    @else
        <form action="{{route('produtos.store')}}" method="POST" class="form">
    @endif

        {!! csrf_field() !!}
        <div class="form-group">
            <input type="text" name="name" placeholder="Nome:" class="form-control" value="{{$product->name or old('name')}}">
        </div>
        <div class="form-group">
            <label>
                <input type="checkbox" name="active" value="1" @if(isset($product) && $product->active == '1') checked @endif>
                Ativo?
            </label>
        </div>
        <div class="form-group">
            <input type="text" name="number" placeholder="Número:" class="form-control" value="{{$product->number or old('number')}}">
        </div>
        <div class="form-group">
            <select name="category" class="form-control">
                <option value="">Escolha a categoria</option>
                @foreach($category as $cat)
                    <option value="{{$cat}}"
                        @if(isset($product) && $product->category == $cat)
                            selected
                        @endif
                    >{{$cat}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <textarea name="description" placeholder="Descrição" class="form-control">{{$product->description or old('description')}}</textarea>
        </div>
        <button class="btn btn-primary">Enviar</button>
    </form>

@endsection
