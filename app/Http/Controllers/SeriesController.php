<?php

namespace App\Http\Controllers;

use App\Serie;
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

    public function store(HttpRequest $request) {
        $serie = Serie::create($request->all());

        $request->session()->flash("mensagem", "Série com o id {$serie->id} adicionada: {$serie->nome}");

        return redirect('/series');
    }

    public function destroy(HttpRequest $request) {    
        Serie::destroy($request->id);

        $request->session()->flash("mensagem", "Série removida!");

        return redirect('series');
    }

}