@extends('series.layout')

@section('cabecalho')
    Séries
@endsection

@section('conteudo')
    <a href="/series/criar">Adicionar</a>
    <ul>
        @foreach ($series as $serie)
            <li> {{ $serie }} </li>
        @endforeach
    </ul>
@endsection
