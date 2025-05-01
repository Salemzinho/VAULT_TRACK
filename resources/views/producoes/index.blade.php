@extends('layouts.app')
@section('title', 'VaultTrack - Produções Audiovisuais')
@section('content')
<h1>Produções Audiovisuais</h1>
<p>Escolha uma das opções abaixo para acessar os registros.</p>
<hr class="bg-light mt-5">
<div class="row mt-5">
    <div class="col-4">
        <a href="{{ route('producoes.create') }}">
            <div class="card card-style mb-4 shadow-sm border-0 rounded-lg">
                <div class="card-body text-center">
                    <h6 class="card-title m-0 p-0">Adicionar um novo item +</h5>
                </div>
            </div>
        </a>
    </div>
</div>
<div class="row mt-5">
    @foreach($producoes as $producao)
    <div class="col-12 mb-3">
        <a href="{{ route('producoes.edit', $producao->id) }}">
            <div class="card card-style shadow-sm border-0 rounded-lg">
                <div class="card-body d-flex justify-content-between align-items-start">
                    <div class="text-container">
                        <h6 class="card-title">
                            {{ $producao->titulo }} ({{ $producao->data_de_lancamento }}),
                            @if($producao->diretor)
                                <i class="text-muted">dir. {{ $producao->diretor }}</i>
                            @elseif($producao->temporada && $producao->quantidade_de_episodios)
                                <i class="text-muted">{{ $producao->temporada }}ª temporada ({{ $producao->quantidade_de_episodios }} episódios)</i>
                            @endif
                        </h6>
                        <p class="card-text small">
                            @if($producao->diretor)
                                🎬 Assistido em {{ \Carbon\Carbon::parse($producao->assistido_em)->format('d/m/Y') }}
                            @elseif($producao->temporada && $producao->quantidade_de_episodios)
                                📺 Assistido em {{ \Carbon\Carbon::parse($producao->assistido_em)->format('d/m/Y') }}
                            @endif
                        </p>
                    </div>
                    @if($producao->banner)
                        <img src="{{ $producao->banner ?? 'img/sem-banner.png' }}" class="img-fluid br-10" alt="{{ $producao->titulo }}" style="max-width: 34px;">
                    @endif
                </div>
            </div>
        </a>
    </div>
    @endforeach
</div>

@endsection