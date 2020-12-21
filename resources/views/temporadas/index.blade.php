@extends('layout')

@section('cabecalho')
Temporadas de {{$serie->nome}}
@endsection

@section('conteudo')
    <ul>
        @foreach($temporadas as $temporada)
            <li>Temporada {{ $temporada->numero }}</li>
        @endforeach
    </ul>
@endsection