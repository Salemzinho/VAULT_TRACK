@extends('layouts.app')
@section('title', 'VaultTrack - Shows')
@section('content')
<div class="container">
    <div class="text-left bg-bluish-purple br-10 p-3">
        <h1 class="font-weight-semibold">🎤 Shows</h1>
        <p class="lead text-muted mt-3 m-0">Escolha uma das opções abaixo para acessar os registros.</p>
    </div>
    <div class="row mt-5">
        <div class="col-12 col-lg-4 col-md-4">
            <a href="{{ route('shows.create') }}">
                <div class="card card-style mb-4 shadow-sm border-0 rounded-lg">
                    <div class="card-body text-center">
                        <h6 class="card-title m-0 p-0">Adicionar um novo item +</h6>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row mt-3">
        @foreach($shows as $show)
        <div class="col-10 mb-3">
            @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
            <a href="{{ route('shows.view', $show->id) }}">
                <div class="card card-style shadow-sm border-0 rounded-lg">
                    <div class="card-body d-flex justify-content-between align-items-start">
                        <div class="text-container">
                            <h6 class="card-title font-weight-semibold">
                                {{ $show->artista }} ({{ $show->nome_do_estabelecimento }})
                            </h6>
                            <p class="card-text small">
                                📅 Assistido em {{ \Carbon\Carbon::parse($show->dia_do_show)->format('d/m/Y') }}
                            </p>
                        </div>
                        @if($show->flyer_vertical)
                            <img src="{{ $show->flyer_vertical }}" class="img-fluid rounded" alt="{{ $show->artista }}" style="max-width: 34px;">
                        @endif
                    </div>
                </div>
            </a>
        </div>
        <div class="col-2 mb-3">
            <a href="{{ route('shows.edit', $show->id) }}">
                <div class="card card-style shadow-sm border-0 rounded-lg mt-3">
                    <div class=" text-center mt-3"> <!-- Adicionei text-center aqui -->
                        <p>Editar</p>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection