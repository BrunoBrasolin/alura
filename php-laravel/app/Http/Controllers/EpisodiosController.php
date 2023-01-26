<?php

namespace App\Http\Controllers;

use App\Episodio;
use App\Temporada;
use Illuminate\Http\Request;

class EpisodiosController extends Controller
{
    public function index(Temporada $temporada, Request $request) // Já faz o find na temporada com o ID que ele pegou da URL
    {

        return view('episodios.index', [
            'episodios' => $temporada->episodios, // Outro modo ao invez de 'compact'
            'temporadaId' => $temporada->id,
            'mensagem' => $request->session()->get('mensagem')
        ]);
    }

    public function assistir(Temporada $temporada, Request $request)
    {
        $episodiosAssistidos = $request->episodios;

        $temporada->episodios->each(function (Episodio $episodio) use ($episodiosAssistidos) { // Para cada episodio da temporada em que o episodio sofreu request
            $episodio->assistido = in_array( // marca se estiver assistido
                $episodio->id, // caso o id do testado no loop
                $episodiosAssistidos // esteja neste array
            );
        });
        $temporada->push(); // Envia tudo que 'mudou' na temporada e suas relações (episodios)

        $request->session()->flash(
            'mensagem',
            'Episódio(s) marcados como assistido(s)'
        );

        return redirect()->back(); // Redireciona para a ultima pagina
    }
}
