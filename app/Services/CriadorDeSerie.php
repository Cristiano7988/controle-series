<?php

namespace App\Services;

use App\Serie;
use Illuminate\Support\Facades\DB;

class CriadorDeSerie
{
    public function criarSerie(
        string $nomeSerie,
        int $qtdTemporadas,
        int $ep_por_temporada,
        ?string $capa
    ): Serie {
        DB::beginTransaction();
        $serie = Serie::create(['nome' => $nomeSerie, 'capa' => $capa]);
        $this->criarTemporadas($ep_por_temporada, $qtdTemporadas, $serie);
        DB::commit();

        return $serie;
    }

    private function criarTemporadas(int $ep_por_temporada, int $qtdTemporadas, $serie) {
        for ($i = 1; $i <= $qtdTemporadas; $i++) {
            $temporada = $serie->temporadas()->create(['numero' => $i]);
            $this->criarEpisodios($ep_por_temporada, $temporada);
        }
    }

    private function criarEpisodios(int $ep_por_temporada, $temporada) {
        for ($j = 1; $j <= $ep_por_temporada; $j++) {
            $temporada->episodios()->create(['numero' => $j]);
        }
    }
}
