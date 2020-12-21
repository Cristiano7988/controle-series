<?php

namespace App\Services;

use App\Serie;

class CriadorDeSerie
{
    public function criarSerie(
        string $nomeSerie,
        int $qtdTemporadas,
        int $ep_por_temporada
    ): Serie {
        $serie = Serie::create(['nome' => $nomeSerie]);

        for ($i = 1; $i <= $qtdTemporadas; $i++) {
            $temporada = $serie->temporadas()->create(['numero' => $i]);

            for ($j = 1; $j <= $ep_por_temporada; $j++) {
                $temporada->episodios()->create(['numero' => $j]);
            }
        }

        return $serie;
    }
}
