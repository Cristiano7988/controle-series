<?php

namespace App\Http\Controllers;

use App\Models\Temporada;

class EpisodiosController extends Controller
{
    public function index(Temporada $temporada) {
        
        $dados['episodios'] = $temporada->episodios;
        $dados['temporada'] = $temporada;

        return view('episodios.index', $dados);
    }
}
