@extends('layout')

@section('cabecalho')
Adicionar Séries
@endsection
@section('conteudo')

@include('mensagem-erro')

<form method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col col-8">
            <label for="nome">Nome da Série</label>
            <input type="text" name="nome" id="nome" class="form-control" autocomplete="off">
        </div>

        <div class="col col-2">
            <label for="numero_temporadas">Nº de Temporadas</label>
            <input type="number" name="numero_temporadas" id="numero_temporadas" class="form-control" autocomplete="off">
        </div>

        <div class="col col-2">
            <label for="numero_episodios">Ep por Temporada</label>
            <input type="number" name="numero_episodios" id="numero_episodios" class="form-control" autocomplete="off">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="capa">Capa da Série</label>
            <input type="file" name="capa" id="capa" class="form-control" autocomplete="off">
        </div>
    </div>
    <button class="btn btn-primary mt-2">Adicionar</button>
</form>
@endsection
