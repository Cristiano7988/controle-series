<?php

namespace App\Services;

use App\Events\SerieApagada;
use App\Jobs\ExcluirCapaSerie;
use App\Models\{Temporada, Episodio};
use App\Serie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RemovedorDeSerie
{
    public function removerSerie(int $serieId ): string
    {
        $nomeSerie = '';
        DB::transaction(function() use($serieId, &$nomeSerie) {
            $serie = Serie::find($serieId);
            $serieObj = (object) $serie->toArray();
            $nomeSerie = $serie->nome;
            $this->removerSerieETemporada($serie);
            $serie->delete();
            
            // Exclui o arquivo
            $evento = new SerieApagada($serieObj);
            event($evento);
            ExcluirCapaSerie::dispatch($serieObj);
        });
        return $nomeSerie;
    }

    private function removerSerieETemporada($serie): void {
        $serie->temporadas->each(function (Temporada $temporada) {
            $this->removerEpisodio($temporada);
            $temporada->delete();
        });
    }

    private function removerEpisodio($temporada): void {
        $temporada->episodios()->each(function (Episodio $episodio) {
            $episodio->delete();
        });
    }
}
