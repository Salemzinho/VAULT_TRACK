@extends('layouts.app')
@section('title', 'VaultTrack - Games')
@section('content')
<div class="text-left bg-bluish-purple br-10 p-3">
    <h1 class="font-weight-semibold">🎮 Games</h1>
    <p class="lead text-muted mt-3 m-0">Aqui está seu registro de "{{ $game->titulo }}" ({{ $game->data_de_lancamento }})</p>
</div>
<div class="row mt-5">
    <div class="col-12 col-lg-4 col-md-4">
        <a href="{{ route('games.index') }}">
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
                    <img src="{{ $game->banner }}" class="w-100 br-10" alt="Banner atual do game">
                </div>
                <div class="col-8 text-container">
                    <h4 class="card-title font-weight-semibold">
                        {{ $game->titulo }} ({{ $game->data_de_lancamento }})
                    </h4>
                    <h6 class="card-text">
                        @if($game->plataforma == "PC")
                            🖥️ Finalizado em {{ \Carbon\Carbon::parse($game->data_de_finalizacao)->format('d/m/Y') }}
                        @elseif($game->temporada == "Console")
                            🎮 Finalizado em {{ \Carbon\Carbon::parse($game->data_de_finalizacao)->format('d/m/Y') }}
                        @endif
                        @if($game->review_link_steam)
                            • <a href="{{ $game->review_link_steam }}" target="_blank"><img src="/img/steam-logo.png" width="16" height="16" alt="Logo do Steam" class="br-10"></a>
                        @endif
                    </h6>
                    <p class="mt-4">"{!! $game->review !!}"</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection