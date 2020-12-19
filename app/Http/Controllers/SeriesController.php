<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request as HttpRequest;

class SeriesController extends Controller {


    public function index() {
        $series = [
            'Lost',
            'Heroes'
        ];

        return  view('series.index')->with(compact('series'));
    }

    public function create() {
        return view('series.create');
    }

    public function store(HttpRequest $request) {
        $nome = $request->nome;
        
        $serie = new Serie();
        $serie->nome = $nome;
        $serie->save();
    }

}