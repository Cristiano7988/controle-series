@extends('series.layout')

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
        <button type="submit">Adicionar</button>
    </form>
@endsection
