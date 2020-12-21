<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\TemporadasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/series', [SeriesController::class, 'index'])->name('listar_series');

Route::get('/series/criar', [SeriesController::class, 'create']);

Route::post('/series/criar', [SeriesController::class, 'store']);

Route::post('/series/remover/{id}', [SeriesController::class, 'destroy']);

Route::get('/series/{serieId}/temporadas', [TemporadasController::class, 'index']);