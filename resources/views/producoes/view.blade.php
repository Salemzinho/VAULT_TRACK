@extends('layouts.app')
@section('title', 'VaultTrack - Produções Audiovisuais')
@section('content')
<h1>Produções Audiovisuais</h1>
<p>Aqui está seu registro de "{{ $producao->titulo }}" ({{ $producao->data_de_lancamento }})</p>
<hr class="bg-light mt-5">
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
<div class="row mt-5">
    <div class="col-12 mb-3">
        <div class="card card-style shadow-sm border-0 rounded-lg">
            <div class="card-body d-flex justify-content-between align-items-start">
                <div class="col-4">
                    <img src="{{ $producao->banner }}" class="w-100" alt="Produções Audiovisuais" class="br-10">
                </div>
                <div class="col-8 text-container">
                    <h4 class="card-title">
                        {{ $producao->titulo }} ({{ $producao->data_de_lancamento }}),
                        @if($producao->diretor)
                            <i class="text-muted">dir. {{ $producao->diretor }}</i>
                        @elseif($producao->temporada && $producao->quantidade_de_episodios)
                            <i class="text-muted">{{ $producao->temporada }}ª temporada ({{ $producao->quantidade_de_episodios }} episódios)</i>
                        @endif
                    </h4>
                    <h6 class="card-text">
                        @if($producao->diretor)
                            🎬 Assistido em {{ \Carbon\Carbon::parse($producao->assistido_em)->format('d/m/Y') }}
                        @elseif($producao->temporada && $producao->quantidade_de_episodios)
                            📺 Assistido em {{ \Carbon\Carbon::parse($producao->assistido_em)->format('d/m/Y') }}
                        @endif
                        @if($producao->nota_pessoal)
                            • ⭐ {{ $producao->nota_pessoal }}
                        @endif
                        @if($producao->nota_pessoal)
                            • <a href="{{ $producao->review_link_imdb }}" target="_blank"><img src="/img/imdb-logo.png" width="36" height="16" alt="Logo do IMDb" class="br-10"></a>
                        @endif
                    </h6>
                    <p class="mt-4">"{!! $producao->review !!}"</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection