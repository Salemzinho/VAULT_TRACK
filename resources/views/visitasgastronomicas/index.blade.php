@extends('layouts.app')
@section('title', 'VaultTrack - Visitas Gastronômicas')
@section('content')
<div class="container">
    <div class="text-left bg-bluish-purple br-10 p-3">
        <h1 class="font-weight-semibold">🍽️ Visitas Gastronômicas</h1>
        <p class="lead text-muted mt-3 m-0">Escolha uma das opções abaixo para acessar os registros.</p>
    </div>
    <div class="row mt-5">
        <div class="col-12 col-lg-4 col-md-4">
            <a href="{{ route('visitasgastronomicas.create') }}">
                <div class="card card-style mb-4 shadow-sm border-0 rounded-lg">
                    <div class="card-body text-center">
                        <h6 class="card-title m-0 p-0">Adicionar um novo item +</h6>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row mt-3">
        @foreach($visitasgastronomicas as $visita)
        <div class="col-10 mb-3">
            @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
            <a href="{{ route('visitasgastronomicas.view', $visita->id) }}">
                <div class="card card-style shadow-sm border-0 rounded-lg">
                    <div class="card-body d-flex justify-content-between align-items-start">
                        <div class="text-container">
                            <h6 class="card-title font-weight-semibold">
                                {{ $visita->nome_do_estabelecimento }} ({{ $visita->dia_da_visita ? \Carbon\Carbon::parse($visita->dia_da_visita)->format('Y') : '—' }})
                            </h6>
                            <p class="card-text small">
                                📍 {{ $visita->local ?? 'Local não informado' }} • 
                                🍽️ Nota Ambiente: {{ $visita->nota_do_ambiente ?? '—' }} • 
                                🛎️ Nota Serviço: {{ $visita->nota_do_servico ?? '—' }} • 
                                🍲 Nota Comida: {{ $visita->nota_da_comida ?? '—' }}
                                @if($visita->review_link_maps)
                                    • <img src="/img/google-maps-logo.png" width="16" height="16" alt="Google Maps" class="br-10">
                                @endif
                            </p>
                        </div>
                        {{-- Caso queira mostrar imagem, mas não tem no modelo, pode retirar --}}
                    </div>
                </div>
            </a>
        </div>
        <div class="col-2 mb-3">
            <a href="{{ route('visitasgastronomicas.edit', $visita->id) }}">
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
