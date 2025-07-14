@extends('layouts.app')
@section('title', 'VaultTrack')
@section('content')
<div class="container">
    <div class="text-left bg-bluish-purple br-10 p-3">
        <h1 class="font-weight-semibold">🎉 Bem-vindo ao VaultTrack!</h1>
        <p class="lead text-muted mt-3 m-0">Organize e acompanhe seus registros cotidianos.</p>
    </div>
    <div class="row mt-5">
        <div class="col-md-4">
            <a href="{{ route('producoes.index') }}">
                <div class="card card-style mb-4 shadow-sm border-0 rounded-lg br-10">
                    <div class="card-body"> 
                        <h6 class="card-title font-weight-semibold">🎬 Produções Audiovisuais</h6>
                        <p class="card-text small">Registre suas produções audiovisuais e veja suas reviews.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('games.index') }}">
                <div class="card card-style mb-4 shadow-sm border-0 rounded-lg br-10">
                    <div class="card-body"> 
                        <h6 class="card-title font-weight-semibold">🎮 Games</h6>
                        <p class="card-text small">Registre seus games finalizados e veja suas reviews.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('shows.index') }}">
                <div class="card card-style mb-4 shadow-sm border-0 rounded-lg br-10">
                    <div class="card-body"> 
                        <h6 class="card-title font-weight-semibold">🎤 Shows</h6>
                        <p class="card-text small">Registre seus shows assistidos durante o passar dos anos.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('literatura.index') }}">
                <div class="card card-style mb-4 shadow-sm border-0 rounded-lg br-10">
                    <div class="card-body"> 
                        <h6 class="card-title font-weight-semibold">📚 Literatura</h6>
                        <p class="card-text small">Registre seus livros lidos e veja suas reviews.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('visitasgastronomicas.index') }}">
                <div class="card card-style mb-4 shadow-sm border-0 rounded-lg br-10">
                    <div class="card-body"> 
                        <h6 class="card-title font-weight-semibold">🍽️ Visitas Gastronômicas</h6>
                        <p class="card-text small">Registre suas visitas a restaurantes e compartilhe suas avaliações.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection