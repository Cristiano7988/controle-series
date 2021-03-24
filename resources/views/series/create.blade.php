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
<form method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col col-8">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control">
        </div>
        <div class="col col-2">
            <label for="qtd_temporadas">Nº temporadas</label>
            <input type="number" name="qtd_temporadas" id="qtd_temporadas" class="form-control">
        </div>
        <div class="col col-2">
            <label for="ep_por_temporada">Ep. por temporada</label>
            <input type="number" name="ep_por_temporada" id="ep_por_temporada" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col col-12">
            <label for="capa">Capa</label>
            <input type="file" name="capa" id="capa" class="form-control">
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-2">Adicionar</button>
</form>
@endsection