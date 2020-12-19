<?php

namespace App\Http\Controllers;

class SeriesController extends Controller {


    function index() {
        $series = [
            'Lost',
            'Heroes'
        ];

        return  view('series.index')->with(compact('series'));
    }

}