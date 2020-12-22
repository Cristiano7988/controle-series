<?php

namespace App\Http\Controllers;

use App\Models\Episodio;
use App\Models\Temporada;
use Illuminate\Http\Request;

class EpisodiosController extends Controller
{
    public function index(Temporada $temporada, Request $request) {
        
        $dados['episodios'] = $temporada->episodios;
        $dados['temporada'] = $temporada;
        $dados['mensagem'] = $request->session()->get('mensagem');

        return view('episodios.index', $dados);
    }

    public function assistir(Temporada $temporada, Request $request) {
        $episodiosAssistidos = $request->episodios;
        $temporada->episodios->each(function(Episodio $episodio) use($episodiosAssistidos) {
            $episodio->assistido = in_array($episodio->id, $episodiosAssistidos);
        });
        $temporada->push();
        $request->session()->flash('mensagem', 'Episódios assistidos');

        return redirect()->back();
    }
}
