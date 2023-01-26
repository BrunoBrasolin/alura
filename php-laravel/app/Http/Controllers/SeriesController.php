<?php

namespace App\Http\Controllers;

use App\Episodio;
use App\Events\NovaSerie as EventsNovaSerie;
use App\Http\Requests\SeriesFormRequest;
use App\Mail\NovaSerie;
use App\Serie;
use App\Services\CriadorDeSeries;
use App\Services\RemovedorDeSeries;
use App\Temporada;
use App\User;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        // var_dump($request->query()); // Retrona todos os parametros da URL em forma de array
        // echo $request->query('parametro'); // Retorna o parametro pedido

        // $series = Serie::all(); // Pega tudo em ordem 'qualquer'
        $series = Serie::query() // Faz uma query
            ->orderBy('nome') // Ordenada por nome
            ->get(); // Retorna com GET

        $mensagem = $request->session()->get('mensagem');

        return view('series.index', compact('series', 'mensagem'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request, CriadorDeSeries $criadorDeSeries)
    {
        //$serie = Serie::create($request->all()); // Já que na classe dele ele só aceita o nome, pode enviar todo o request

        $nomeSerie = $request->nome;
        $numeroTemporadas = $request->numero_temporadas;
        $numeroEpisodios = $request->numero_episodios;
        $capa = null;
        if ($request->hasFile('capa'))
            $capa = $request->file('capa')->store('serie');

        $criadorDeSeries->criarSerie($nomeSerie, $numeroTemporadas, $numeroEpisodios, $capa);

        $eventoNovaSerie = new EventsNovaSerie($nomeSerie, $numeroTemporadas, $numeroEpisodios);
        event($eventoNovaSerie);

        $request->session()->flash(
            'mensagem', //Nome da Variavel; Flash é uma variavel que dura uma sessão, apos recarregar ela some
            "Série '$nomeSerie' cadastrada com sucesso | Temporadas: $numeroTemporadas | Episódios: $numeroEpisodios"
        ); // Variavel

        return redirect()->route('listar_series'); // Apenas redireciona
        // $serie = Serie::create([
        //     'nome' => $nome // Outro modo
        // ]);

        // $serie = new Serie();
        // $serie->nome = $nome; // Outro modo
        // $serie->save();
    }

    public function destroy(Request $request, RemovedorDeSeries $removedorDeSeries)
    {
        $serieId = $request->id;

        $serie = $removedorDeSeries->remover($serieId);

        $request->session()->flash('mensagem', "Série '$serie' deletada com sucesso");
        return redirect()->route('listar_series');
    }

    public function edit(int $id, Request $request) // Laravel identifica que possui uma variavel ID na rota
    {
        $novoNome = $request->nome;
        $serie = Serie::find($id);
        $serie->nome = $novoNome;
        $serie->save();
    }
}
