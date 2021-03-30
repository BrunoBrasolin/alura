@extends('layout')

@section('cabecalho')
Episódios
@endsection

@section('conteudo')

@include('mensagem-sucesso')

<form action="/temporadas/{{$temporadaId}}/episodios/assistir" method="post">
    @csrf
    <ul class="list-group">
        @foreach ($episodios as $episodio)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Episódio {{$episodio->numero}}
            @auth
            <input type="checkbox" name="episodios[]" value="{{$episodio->id}}"
                {{ $episodio->assistido ? 'checked' : '' }}>
            @endauth
            @guest
            <input type="checkbox" disabled value="{{$episodio->id}}"
            {{ $episodio->assistido ? 'checked' : '' }}>
            @endguest
        </li>
        @endforeach
    </ul>
    @auth
    <button class=" btn btn-primary mt-2 mb-2">Salvar episódios assistidos</button>
    @endauth
</form>

@endsection
