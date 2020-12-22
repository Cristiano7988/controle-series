@extends('layout')

@section('cabecalho')
Séries
@endsection

@section('conteudo')
@if(!empty($mensagem))
<div class="alert alert-success">
    {{ $mensagem }}
</div>
@endif
<a href="/series/criar" class="btn btn-primary mb-2">Adicionar</a>
<ul class="list-group">
    @foreach ($series as $serie)
    <li class="list-group-item">
        <div class="row d-flex justify-content-between align-items-center m-1">
            <div class="d-flex align-items-center">
                <span id="nome-serie-{{$serie->id}}"> {{ $serie->nome }}</span>
                
                <div class="input-group w-100" hidden id="input-nome-serie-{{$serie->id}}">
                    <input type="text" class="form-control" value="{{$serie->nome}}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" onclick="editarSerie({{ $serie->id }})"><i class="fas fa-check"></i></button>
                        @csrf
                    </div>
                </div>
            </div>
            <div class="d-flex">
                <button class="btn btn-primary mr-2" onclick="toggleInput({{ $serie->id }})"><i class="fas fa-edit"></i></button>
                <a href="/series/{{ $serie->id }}/temporadas" class="btn btn-secondary">Temporadas</a>
                <form method="post" action="series/remover/{{ $serie->id }}" onsubmit="return confirm('Tem certeza?')">
                    @csrf
                    <button class="btn btn-danger ml-2" type="submit"><i class="far fa-trash-alt"></i></button>
                </form>
            </div>
        </div>
    </li>
    @endforeach
</ul>
@endsection

<script>
    function toggleInput(serieId) {
        nomeEl = document.getElementById(`input-nome-serie-${serieId}`);
        inputEl = document.getElementById(`nome-serie-${serieId}`); 
        
        inputEl.hasAttribute('hidden') ? (
            inputEl.removeAttribute('hidden'),
            nomeEl.hidden = true
        ) : (
            nomeEl.removeAttribute('hidden'),
            inputEl.hidden = true
        );
    }
</script>