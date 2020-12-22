@extends('layout')

@section('cabecalho')
Episódios da temporada {{ $temporada->numero }}
@endsection

@section('conteudo')

@include('mensagem', compact('mensagem'))

<form action="/temporadas/{{ $temporada->id }}/episodios/assistir" method="post">
    @csrf
    <ul class="list-group">
        @foreach($episodios as $episodio)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <span>
                Episódios {{ $episodio->numero }}
            </span>
            <input type="checkbox" name="episodios[]" value="{{ $episodio->id }}" {{ $episodio->assistido ? 'checked' : '' }}>
        </li>
        @endforeach
    </ul>
    <a href="/series" class="btn btn-primary mt-2">Voltar</a>
    <button type="submit" class="btn btn-outline-primary mt-2">Salvar</button>
</form>
@endsection