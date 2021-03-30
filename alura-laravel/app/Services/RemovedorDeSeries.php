<?php


namespace App\Services;

use App\{Serie, Temporada, Episodio};
use App\Events\SerieApagada;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RemovedorDeSeries
{
    public function remover(int $serieId): string
    {
        DB::beginTransaction();
        $serie = Serie::find($serieId);
        $nomeSerie = $serie->nome;
        $this->removerSerie($serie);
        DB::commit();

        return $nomeSerie;
    }

    public function removerSerie(Serie $serie)
    {
        $serie->temporadas->each(function (Temporada $temporada) {
            $this->removerTemporada($temporada);
        });
        $serie->delete();
        $evento = new SerieApagada($serie);
        event($evento);
    }

    public function removerTemporada(Temporada $temporada)
    {
        $temporada->episodios->each(function (Episodio $episodio) {
            $this->removerEpisodio($episodio);
        });
        $temporada->delete();
    }

    public function removerEpisodio(Episodio $episodio)
    {
        $episodio->delete();
    }
}
