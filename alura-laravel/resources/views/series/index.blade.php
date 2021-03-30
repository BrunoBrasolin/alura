@extends('layout')

@section('cabecalho')
Séries
@endsection


@section('conteudo')

@include('mensagem-sucesso')

@auth
<a href="{{route('form_criar_serie')}}" class="btn btn-dark mb-2">Adicionar</a>
@endauth

<ul class="list-group">
    @foreach($series as $serie)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <div>
            <img src="{{ $serie->capa_url }}" alt="Imagem série" class="img-thumbnail" height="100px" width="100px">
            <span id="nome-serie-{{ $serie->id }}">{{ $serie->nome }}</span>
        </div>
        @auth
        <div class="input-group w-50" hidden id="input-nome-serie-{{ $serie->id }}">
            <input id="input-{{$serie->id}}" type="text" class="form-control" value="{{ $serie->nome }}">
            <div class="input-group-append">
                <button class="btn btn-primary" onclick="editarSerie({{ $serie->id }})">
                    <i class="fas fa-check"></i>
                </button>
                @csrf
            </div>
        </div>
        @endauth

        <span class="d-flex">
            @auth
            <button class="btn btn-info btn-sm mr-1" onclick="toggleInput({{ $serie->id }});">
                <i class="fas fa-edit"></i>
            </button>
            <form method="post" action="/series/{{ $serie->id }}" class="mr-1" onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes($serie->nome) }}?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">
                    <i class="far fa-trash-alt"></i>
                </button>
            </form>
            @endauth
            <a href="/series/{{ $serie->id }}/temporadas" class="btn btn-info btn-sm">
                <i class="fas fa-external-link-alt"></i>
            </a>
        </span>
    </li>
    @endforeach
</ul>

<script>
    function toggleInput(serieId) {
        const inputSerie = document.getElementById(`input-nome-serie-${serieId}`);
        const nomeSerie = document.getElementById(`nome-serie-${serieId}`);
        if (nomeSerie.hasAttribute('hidden')) {
            inputSerie.hidden = true;
            nomeSerie.removeAttribute('hidden');
        } else {
            inputSerie.removeAttribute('hidden');
            nomeSerie.hidden = true;
        }
    }

    function editarSerie(serieId) {
        let formData = new FormData();

        const nome = document.getElementById(`input-${serieId}`).value;
        formData.append('nome', nome);

        const token = document.querySelector('input[name="_token"]').value;
        formData.append('_token', token);

        const url = `/series/${serieId}/editaNome`;
        fetch(url, {
            body: formData,
            method: 'POST'
        }).then(() => {
            toggleInput(serieId);
            document.getElementById(`nome-serie-${serieId}`).textContent = nome;
        });
    }
</script>

@endsection
