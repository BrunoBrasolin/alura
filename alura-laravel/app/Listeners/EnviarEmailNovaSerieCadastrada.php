<?php

namespace App\Listeners;

use App\Events\NovaSerie;
use App\Mail\NovaSerie as MailNovaSerie;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnviarEmailNovaSerieCadastrada implements ShouldQueue // "Fala" pro laravel que este evendo precisa ser jogado para uma fila de forma sincrona
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
        $numeroTemporadas = $event->numeroTemporadas;
        $numeroEpisodios = $event->numeroEpisodios;
        $users = User::all(); // Pega todos os usuarios disponiveis
        foreach ($users as $indice => $user) {  // Faz um foreach para cada usuario - enviar email | Esse indice conta uma variavel desde o 0 ate quando parar
            // Importante criar a instancia dentro do foreach por conta dos destinatarios dos emails
            $email = new MailNovaSerie($nomeSerie, $numeroTemporadas, $numeroEpisodios); // Cria com os parametros
            // \Illuminate\Support\Facades\Mail::to($user)->send($email); // Envia o email para o usuario do foreach
            $delay = now()->addSecond(++$indice * 10); // Coloca o delay que vai esperar caso de um erro na execução da fila
            \Illuminate\Support\Facades\Mail::to($user)->later($delay, $email); // Coloca na lista para enviar assim que
            // sleep(5); // Espera 5 segundos por conta do smtp (nao cair no spam)
        }
    }
}
