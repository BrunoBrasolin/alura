<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episodio extends Model
{
    public $timestamps = false; // Não guarda 'updated at' nem 'created at'
    protected $fillable = ['numero']; // Para prevenir que outros campos sejam inseridos no BD

    public function temporada()
    {
        return $this->belongsTo(Temporada::class);
    }
}
