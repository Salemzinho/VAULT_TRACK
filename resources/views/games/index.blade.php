@extends('layouts.app')
@section('title', 'VaultTrack - Games')
@section('content')
<div class="text-left bg-bluish-purple br-10 p-3">
    <h1 class="font-weight-semibold">🎮 Games</h1>
    <p class="lead text-muted mt-3 m-0">Escolha uma das opções abaixo para acessar os registros.</p>
</div>
<div class="row mt-5">
    <div class="col-12 col-lg-4 col-md-4">
        <a href="{{ route('games.create') }}">
            <div class="card card-style mb-4 shadow-sm border-0 rounded-lg">
                <div class="card-body text-center">
                    <h6 class="card-title m-0 p-0">Adicionar um novo item +</h5>
                </div>
            </div>
        </a>
    </div>
</div>
<div class="row mt-5">
    @foreach($games as $game)
    <div class="col-10 mb-3">
        @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
        <a href="{{ route('games.view', $game->id) }}">
            <div class="card card-style shadow-sm border-0 rounded-lg">
                <div class="card-body d-flex justify-content-between align-items-start">
                    <div class="text-container">
                        <h6 class="card-title">
                            {{ $game->titulo }} ({{ $game->data_de_lancamento }})
                        </h6>
                        <p class="card-text small">
                            @if($game->plataforma == "PC")
                                🖥️ Finalizado em {{ \Carbon\Carbon::parse($game->data_de_finalizacao)->format('d/m/Y') }}
                            @elseif($game->temporada == "Console")
                                🎮 Finalizado em {{ \Carbon\Carbon::parse($game->data_de_finalizacao)->format('d/m/Y') }}
                            @endif
                            @if($game->review_link_steam)
                                 • <img src="/img/steam-logo.png" width="16" height="16" alt="Logo do Steam" class="br-10">
                            @endif
                        </p>
                    </div>
                    @if($game->banner)
                        <img src="{{ $game->banner }}" class="img-fluid br-10" alt="{{ $game->titulo }}" style="max-width: 34px;">
                    @endif
                </div>
            </div>
        </a>
    </div>
    <div class="col-2 mb-3">
        <a href="{{ route('games.edit', $game->id) }}">
            <div class="card card-style shadow-sm border-0 rounded-lg mt-3">
                <div class=" text-center mt-3"> <!-- Adicionei text-center aqui -->
                    <p>Editar</p>
                </div>
            </div>
        </a>
    </div>
    @endforeach
</div>

@endsection