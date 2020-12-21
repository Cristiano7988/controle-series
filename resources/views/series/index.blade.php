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
            <div>
                <span> {{ $serie->nome }}</span>
            </div>
            <div class="d-flex">
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