@extends('series.layout')

@section('cabecalho')
Séries
@endsection

@section('conteudo')
    @if(!empty($mensagem))
        <p>{{ $mensagem }}</p>
    @endif
    <a href="/series/criar">Adicionar</a>
    <ul>
        @foreach ($series as $serie)
        <li>
            {{ $serie->nome }}
            <form method="post" action="series/remover/{{ $serie->id }}" onsubmit="return confirm('Tem certeza?')">
                @csrf
                <button type="submit">Excluir</button>
            </form>
        </li>
        @endforeach
    </ul>
@endsection