@extends('layouts.app')
@section('title', 'VaultTrack - Shows')
@section('content')
<div class="container">
    <div class="text-left bg-bluish-purple br-10 p-3">
        <h1 class="font-weight-semibold">🎤 Show</h1>
        <p class="lead text-muted mt-3 m-0">Aqui está seu registro de "{{ $show->artista }}" ({{ $show->nome_do_estabelecimento }})</p>
    </div>
    <div class="row mt-5">
        <div class="col-12 col-lg-4 col-md-4">
            <a href="{{ route('shows.index') }}">
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
                <div class="card-body d-flex justify-content-between align-items-start flex-wrap">
                    <div class="col-4 mb-3">
                        @if($show->flyer_vertical)
                            <img src="{{ $show->flyer_vertical }}" class="w-100 br-10" alt="Flyer Vertical do Show">
                        @else
                            <p class="text-muted">Sem flyer disponível.</p>
                        @endif
                    </div>
                    <div class="col-8 text-container">
                        <h4 class="card-title font-weight-semibold">
                            {{ $show->artista }} ({{ $show->nome_do_estabelecimento }})
                        </h4>
                        <h6 class="card-text mt-2">
                            📅 Realizado em {{ \Carbon\Carbon::parse($show->dia_do_show)->format('d/m/Y') }}
                            @if($show->link_video)
                                • <a href="{{ $show->link_video }}" target="_blank"><img src="/img/play-icon.png" width="16" height="16" alt="Vídeo" class="br-10"></a>
                            @endif
                        </h6>
                        @if($show->setlist)
                            <p class="mt-3"><strong>Setlist:</strong><br>{!! nl2br(e($show->setlist)) !!}</p>
                        @endif
                        @if($show->foto_artista)
                            <div class="mt-3">
                                <p class="mb-1"><strong>Foto do Artista:</strong></p>
                                <img src="{{ $show->foto_artista }}" alt="Foto do Artista" class="img-fluid rounded" style="max-height: 150px;">
                            </div>
                        @endif
                        @if($show->flyer_horizontal)
                            <div class="mt-3">
                                <p class="mb-1"><strong>Flyer Horizontal:</strong></p>
                                <img src="{{ $show->flyer_horizontal }}" alt="Flyer Horizontal" class="img-fluid rounded" style="max-height: 150px;">
                            </div>
                        @endif
                        @if($show->fotos)
                            <div class="mt-3">
                                <p class="mb-1"><strong>Fotos adicionais:</strong></p>
                                @foreach(json_decode($show->fotos, true) as $foto)
                                    <img src="{{ $foto }}" alt="Foto adicional" class="img-fluid rounded mr-2 mb-2" style="max-height: 100px;">
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
