@extends('layout')

@section('cabecalho')
    Adicionar Série
@endsection

@section('conteudo')
@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
    <form method="post">
        @csrf
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome">
        
        <label for="qtd_temporadas">Nº temporadas</label>
        <input type="number" name="qtd_temporadas" id="qtd_temporadas">

        <label for="ep_por_temporada">Ep. por temporada</label>
        <input type="number" name="ep_por_temporada" id="ep_por_temporada">

        <button type="submit">Adicionar</button>
    </form>
@endsection
