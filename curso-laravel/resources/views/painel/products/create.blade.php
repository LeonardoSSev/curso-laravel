@extends('painel.templates.template')

@section('content')
    <h1 class="title-pg">Gestão Produto</h1>

    <form action="{{route('produtos.store')}}" method="POST" class="form">
        {!! csrf_field() !!}
        <div class="form-group">
            <input type="text" name="name" placeholder="Nome:" class="form-control">
        </div>
        <div class="form-group">
            <label>
                <input type="checkbox" name="active" value="1">
                Ativo?
            </label>
        </div>
        <div class="form-group">
            <input type="text" name="number" placeholder="Número:" class="form-control">
        </div>
        <div class="form-group">
            <select name="category" class="form-control">
                <option>Escolha a categoria</option>
                @foreach($category as $cat)
                    <option value="{{$cat}}">{{$cat}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <textarea name="description" placeholder="Descrição" class="form-control"></textarea>
        </div>
        <button class="btn btn-primary">Enviar</button>
    </form>

@endsection
