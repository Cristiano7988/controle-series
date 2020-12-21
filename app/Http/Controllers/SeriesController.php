<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Serie;
use App\Services\CriadorDeSerie;
use App\Services\RemovedorDeSerie;
use Illuminate\Http\Request as HttpRequest;

class SeriesController extends Controller {


    public function index(HttpRequest $request) {
        $series = Serie::query()->orderBy('nome')->get();
        $mensagem = $request->session()->get('mensagem');

        return  view('series.index')->with(compact('series', 'mensagem'));
    }

    public function create() {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request, CriadorDeSerie $criadorDeSerie) {
        $serie = $criadorDeSerie->criarSerie($request->nome, $request->qtd_temporadas, $request->ep_por_temporada);

        $request->session()->flash("mensagem", "Série com o id {$serie->id} e suas temporadas e episódios adicionados: {$serie->nome}");

        return redirect()->route('listar_series');
    }

    public function destroy(HttpRequest $request, RemovedorDeSerie $removedorDeSerie) {    
        $nomeSerie = $removedorDeSerie->removerSerie($request->id);

        $request->session()->flash("mensagem", "Série {$nomeSerie} removida!");

        return redirect()->route('listar_series');
    }

}