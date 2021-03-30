<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NovaSerie
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $nomeSerie;
    public $numeroTemporadas;
    public $numeroEpisodios;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($nomeSerie, $numeroTemporadas, $numeroEpisodios)
    {
        $this->nomeSerie = $nomeSerie;
        $this->numeroTemporadas = $numeroTemporadas;
        $this->numeroEpisodios = $numeroEpisodios;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
