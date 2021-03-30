<?php

namespace App\Services;

use App\{Serie, Temporada, Episodio};
use Illuminate\Support\Facades\DB;

class CriadorDeSeries
{

    public function criarSerie(string $nomeSerie, int $numeroTemporadas, int $numeroEpiodios, ?string $capa): Serie
    {
        DB::beginTransaction();
        $serie = Serie::create(['nome' => $nomeSerie, 'capa' => $capa]);
        $this->criarTemporada($serie, $numeroTemporadas, $numeroEpiodios);
        DB::commit();
        return $serie;
    }

    private function criarTemporada(Serie $serie, $numeroTemporadas, $numeroEpiodios)
    {
        for ($i = 1; $i <= $numeroTemporadas; $i++) {
            $temporada = $serie->temporadas()->create(['numero' => $i]);
            $this->criarEpisodio($temporada, $numeroEpiodios);
        }
    }

    private function criarEpisodio(Temporada $temporada, $numeroEpiodios): void
    {
        for ($j = 1; $j <= $numeroEpiodios; $j++) {
            $episodio = $temporada->episodios()->create(['numero' => $j]);
        }
    }
}
