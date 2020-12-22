@extends('layout')

@section('cabecalho')
Episódios da temporada {{ $temporada->numero }}
@endsection

@section('conteudo')
<form action="" method="post">
    <ul class="list-group">
        @foreach($episodios as $episodio)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <span>
                Episódios {{ $episodio->numero }}
            </span>
            <input type="checkbox">
        </li>
        @endforeach
    </ul>
    <button type="submit" class="btn btn-primary mt-2">Salvar</button>
</form>
@endsection