@extends('layouts.app')
@section('title', 'VaultTrack - Produções Audiovisuais')
@section('content')
<div class="container">
    <div class="text-left bg-bluish-purple br-10 p-3">
        <h1 class="font-weight-semibold">🎬 Produções Audiovisuais</h1>
        <p class="lead text-muted mt-3 m-0">Aqui está seu registro de "{{ $producao->titulo }}" ({{ $producao->data_de_lancamento }})</p>
    </div>
    <div class="row mt-5">
        <div class="col-12 col-lg-4 col-md-4">
            <a href="{{ route('producoes.index') }}">
                <div class="card card-style mb-4 shadow-sm border-0 rounded-lg">
                    <div class="card-body text-center">
                        <h6 class="card-title m-0 p-0">Voltar</h5>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12 mb-3">
            <div class="card bg-bluish-purple shadow-sm border-0 rounded-lg">
                <div class="card-body d-flex justify-content-between align-items-start">
                    <div class="col-4">
                        <img src="{{ $producao->banner }}" class="w-100 br-10" alt="Produções Audiovisuais">
                    </div>
                    <div class="col-8 text-container">
                        <h4 class="card-title font-weight-semibold">
                            {{ $producao->titulo }} ({{ $producao->data_de_lancamento }}),
                            @if($producao->diretor)
                                <i class="text-muted">dir. {{ $producao->diretor }}</i>
                            @elseif($producao->temporada && $producao->quantidade_de_episodios)
                                <i class="text-muted">{{ $producao->temporada }}ª temporada ({{ $producao->quantidade_de_episodios }} episódios)</i>
                            @endif
                        </h4>
                        <h6 class="card-text">@dd($producao->finalizado_em)
                            @if($producao->diretor)
                                🎬 Assistido em {{ \Carbon\Carbon::parse($producao->assistido_em)->format('d/m/Y') }}
                            @elseif(($producao->temporada && $producao->quantidade_de_episodios) && ($producao->iniciado_em && $producao->finalizado_em))
                                🌸 Assistido de {{ \Carbon\Carbon::parse($producao->iniciado_em)->format('d/m/Y') }} a {{ \Carbon\Carbon::parse($producao->finalizado_em)->format('d/m/Y') }}
                            @elseif($producao->temporada && $producao->quantidade_de_episodios)
                                📺 Assistido em {{ \Carbon\Carbon::parse($producao->assistido_em)->format('d/m/Y') }}
                            @endif
                            @if($producao->nota_pessoal)
                                • ⭐ {{ $producao->nota_pessoal }}
                            @endif
                            @if($producao->review_link_imdb)
                                • <a href="{{ $producao->review_link_imdb }}" target="_blank"><img src="/img/imdb-logo.png" width="36" height="16" alt="Logo do IMDb" class="rounded"></a>
                            @endif
                        </h6>
                        <p class="mt-4">"{!! $producao->review !!}"</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection