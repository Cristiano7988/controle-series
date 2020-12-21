@extends('layout')

@section('cabecalho')
Adicionar Série
@endsection

@section('conteudo')
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form method="post">
    @csrf
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" class="form-control">
    </div>
    <div class="form-group">
        <label for="qtd_temporadas">Nº temporadas</label>
        <input type="number" name="qtd_temporadas" id="qtd_temporadas" class="form-control">
    </div>
    <div class="form-group">
        <label for="ep_por_temporada">Ep. por temporada</label>
        <input type="number" name="ep_por_temporada" id="ep_por_temporada" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Adicionar</button>
</form>
@endsection