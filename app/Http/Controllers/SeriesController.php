<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Mail\NovaSerie;
use App\Serie;
use App\Services\CriadorDeSerie;
use App\Services\RemovedorDeSerie;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Mail;

class SeriesController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(HttpRequest $request) {
        $series = Serie::query()->orderBy('nome')->get();
        $mensagem = $request->session()->get('mensagem');

        return  view('series.index')->with(compact('series', 'mensagem'));
    }

    public function create() {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request, CriadorDeSerie $criadorDeSerie) {
        // Envia email
        $users = User::all();
        foreach($users as $index => $user) {
            $multiplicador = $index + 1;
            $when = now()->addSecond($multiplicador * 5);
            $email = new NovaSerie($request->nome, $request->qtd_temporadas, $request->ep_por_temporada);
            $email->subject('Nova série adicionada');
            Mail::to($user)->later($when, $email);
        }

        // Armazena série
        $serie = $criadorDeSerie->criarSerie($request->nome, $request->qtd_temporadas, $request->ep_por_temporada);

        $request->session()->flash("mensagem", "Série com o id {$serie->id} e suas temporadas e episódios adicionados: {$serie->nome}");

        return redirect()->route('listar_series');
    }

    public function destroy(HttpRequest $request, RemovedorDeSerie $removedorDeSerie) {    
        $nomeSerie = $removedorDeSerie->removerSerie($request->id);

        $request->session()->flash("mensagem", "Série {$nomeSerie} removida!");

        return redirect()->route('listar_series');
    }

    public function editaNome(int $id, HttpRequest $request) {
        $novoNome = $request->nome;
        $serie = Serie::find($id);
        $serie->nome = $novoNome;
        $serie->save();
    }

}