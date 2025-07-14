@extends('layouts.app')
@section('title', 'VaultTrack - Literatura')
@section('content')
<div class="container">
    <div class="text-left bg-bluish-purple br-10 p-3">
        <h1 class="font-weight-semibold">📚 Literatura</h1>
        <p class="lead text-muted mt-3 m-0">
            Aqui está seu registro de "{{ $literatura->titulo }}" ({{ $literatura->data_de_lancamento ? \Carbon\Carbon::parse($literatura->data_de_lancamento)->format('Y') : '—' }})
        </p>
    </div>
    <div class="row mt-5">
        <div class="col-12 col-lg-4 col-md-4">
            <a href="{{ route('literatura.index') }}">
                <div class="card card-style mb-4 shadow-sm border-0 rounded-lg">
                    <div class="card-body text-center">
                        <h6 class="card-title m-0 p-0">Voltar</h6>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12 mb-3">
            <div class="card bg-bluish-purple shadow-sm border-0 rounded-lg">
                <div class="card-body d-flex">
                    <div class="col-4">
                        @if($literatura->banner)
                            <img src="{{ $literatura->banner }}" class="w-100 br-10" alt="Banner do livro">
                        @endif
                    </div>
                    <div class="col-8 text-container">
                        <h4 class="card-title font-weight-semibold">
                            {{ $literatura->titulo }} ({{ $literatura->data_de_lancamento ? \Carbon\Carbon::parse($literatura->data_de_lancamento)->format('Y') : '—' }})
                        </h4>
                        <h6 class="text-muted mb-3" style="font-style: italic;">
                            Autor: {{ $literatura->autor ?? '—' }}
                        </h6>
                        <h6 class="card-text">
                            📅 Lido de {{ $literatura->data_de_leitura_inicial ? \Carbon\Carbon::parse($literatura->data_de_leitura_inicial)->format('d/m/Y') : '—' }}
                            até {{ $literatura->data_de_leitura_final ? \Carbon\Carbon::parse($literatura->data_de_leitura_final)->format('d/m/Y') : '—' }}
                            @if($literatura->review_link)
                                • <a href="{{ $literatura->review_link }}" target="_blank" class="text-white">🔗 Link</a>
                            @endif
                        </h6>
                        <p class="mt-4">"{!! $literatura->review !!}"</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
