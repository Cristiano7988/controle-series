@extends('series.layout')

@section('cabecalho')
    Adicionar Série
@endsection

@section('conteudo')
    <form method="post">
        @csrf
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome">
        <button type="submit">Adicionar</button>
    </form>
@endsection
