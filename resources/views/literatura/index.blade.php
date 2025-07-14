@extends('layouts.app')
@section('title', 'VaultTrack - Literatura')
@section('content')
<div class="container">
    <div class="text-left bg-bluish-purple br-10 p-3">
        <h1 class="font-weight-semibold">📚 Literatura</h1>
        <p class="lead text-muted mt-3 m-0">Escolha uma das opções abaixo para acessar os registros.</p>
    </div>
    <div class="row mt-5">
        <div class="col-12 col-lg-4 col-md-4">
            <a href="{{ route('literatura.create') }}">
                <div class="card card-style mb-4 shadow-sm border-0 rounded-lg">
                    <div class="card-body text-center">
                        <h6 class="card-title m-0 p-0">Adicionar um novo item +</h6>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row mt-3">
        @foreach($literaturas as $literatura)
        <div class="col-10 mb-3">
            @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
            <a href="{{ route('literatura.view', $literatura->id) }}">
                <div class="card card-style shadow-sm border-0 rounded-lg">
                    <div class="card-body d-flex justify-content-between align-items-start">
                        <div class="text-container">
                            <h6 class="card-title font-weight-semibold">
                                {{ $literatura->titulo }} — <small class="text-muted">{{ $literatura->autor }}</small> ({{ \Carbon\Carbon::parse($literatura->data_de_lancamento)->format('Y') ?? '—' }})
                            </h6>
                            <p class="card-text small">
                                📖 Lido entre {{ $literatura->data_de_leitura_inicial ? \Carbon\Carbon::parse($literatura->data_de_leitura_inicial)->format('d/m/Y') : '—' }} 
                                e {{ $literatura->data_de_leitura_final ? \Carbon\Carbon::parse($literatura->data_de_leitura_final)->format('d/m/Y') : '—' }}
                            </p>
                        </div>
                        @if($literatura->banner)
                            <img src="{{ $literatura->banner }}" class="img-fluid rounded" alt="{{ $literatura->titulo }}" style="max-width: 34px;">
                        @endif
                    </div>
                </div>
            </a>
        </div>
        <div class="col-2 mb-3">
            <a href="{{ route('literatura.edit', $literatura->id) }}">
                <div class="card card-style shadow-sm border-0 rounded-lg mt-3">
                    <div class="text-center mt-3">
                        <p>Editar</p>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
