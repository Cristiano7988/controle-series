<?php

namespace App\Services;

use App\Models\{Temporada, Episodio};
use App\Serie;
use Illuminate\Support\Facades\DB;

class RemovedorDeSerie
{
    public function removerSerie(int $serieId ): string
    {
        $nomeSerie = '';
        DB::transaction(function() use($serieId, &$nomeSerie) {
            $serie = Serie::find($serieId);
            $nomeSerie = $serie->nome;
            $this->removerSerieETemporada($serie);
            $serie->delete();
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
