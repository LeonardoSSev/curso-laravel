@extends('site.templates.template1')
@section('content')
    <h1>Teste Home Page</h1>
    @if ($var1 == 1234)
        <p>É igual</p>
    @else
        <p>É diferente</p>
    @endif

    @for($i = 0; $i < 10; $i++)
        <p>For: {{$i}} </p>
    @endfor

    {{--
    @if( count($arrayData) > 0)
        @foreach($arrayData as $valor)
            <p>Foreach: {{$valor}} </p>
        @endforeach
    @else
        <p>Não há valor no arrayData</p>
    @endif
    --}}

    @forelse($arrayData as $valor)
        <p>Foreach: {{$valor}}</p>
    @empty
        <p>Não há valor no arrayData</p>
    @endforelse


    @include('site.includes.sidebar')
@endsection