<?php

namespace App\Listeners;

use App\Events\NovaSerie;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogNovaSerieCadastrada implements ShouldQueue // "Fala" pro laravel que este evendo precisa ser jogado para uma fila de forma sincrona
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NovaSerie  $event
     * @return void
     */
    public function handle(NovaSerie $event)
    {
        $nomeSerie = $event->nomeSerie;
        \Illuminate\Support\Facades\Log::info('Serie nova cadastrada: ' . $nomeSerie);
    }
}
