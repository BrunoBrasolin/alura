<?php


namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Serie extends Model
{
    // protected $table = 'series'; // Omitido pois nome da tabela e o do banco de dados são os mesmos

    public $timestamps = false; // Não guarda 'updated at' nem 'created at'
    protected $fillable = ['nome', 'capa']; // Para prevenir que outros campos sejam inseridos no BD

    public function getCapaUrlAttribute()
    {
        if ($this->capa) return  Storage::url($this->capa);
        else return Storage::url("serie/sem-imagem.jpeg");
    }

    public function temporadas()
    {
        return $this->hasMany(Temporada::class);
    }
}
