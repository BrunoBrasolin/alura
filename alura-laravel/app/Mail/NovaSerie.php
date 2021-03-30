<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NovaSerie extends Mailable
{
    use Queueable, SerializesModels;

    public $nomeSerie;
    public $numeroTemporadas;
    public $numerosEpisodios;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nomeSerie, $numeroTemporadas, $numerosEpisodios)
    {
        $this->nomeSerie = $nomeSerie;
        $this->numeroTemporadas = $numeroTemporadas;
        $this->numerosEpisodios = $numerosEpisodios;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.serie.nova-serie');
    }
}
