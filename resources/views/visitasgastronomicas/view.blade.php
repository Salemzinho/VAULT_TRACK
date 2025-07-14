@extends('layouts.app')
@section('title', 'VaultTrack - Visitas Gastronômicas')
@section('content')
<div class="container">
    <div class="text-left bg-bluish-purple br-10 p-3">
        <h1 class="font-weight-semibold">🍽️ Visitas Gastronômicas</h1>
        <p class="lead text-muted mt-3 m-0">Aqui está seu registro de "{{ $visita->nome_do_estabelecimento }}" ({{ $visita->dia_da_visita ? \Carbon\Carbon::parse($visita->dia_da_visita)->format('Y') : '—' }})</p>
    </div>
    <div class="row mt-5">
        <div class="col-12 col-lg-4 col-md-4">
            <a href="{{ route('visitasgastronomicas.index') }}">
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
                <div class="card-body d-flex justify-content-between align-items-start">
                    <div class="col-4">
                        {{-- Se tiver imagem, coloque aqui, se não remova esta div --}}
                    </div>
                    <div class="col-8 text-container">
                        <h4 class="card-title font-weight-semibold">
                            {{ $visita->nome_do_estabelecimento }} ({{ $visita->dia_da_visita ? \Carbon\Carbon::parse($visita->dia_da_visita)->format('d/m/Y') : '—' }})
                        </h4>
                        <h6 class="card-text">
                            📍 {{ $visita->local ?? 'Local não informado' }} <br>
                            🍽️ Nota Ambiente: {{ $visita->nota_do_ambiente ?? '—' }} • 
                            🛎️ Nota Serviço: {{ $visita->nota_do_servico ?? '—' }} • 
                            🍲 Nota Comida: {{ $visita->nota_da_comida ?? '—' }}
                            @if($visita->review_link_maps)
                                • <a href="{{ $visita->review_link_maps }}" target="_blank" class="text-white">🔗 Google Maps</a>
                            @endif
                        </h6>
                        <p class="mt-4">"{!! $visita->review !!}"</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
