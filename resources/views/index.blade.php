@extends('layouts.app')
@section('title', 'Página Inicial')
@section('content')
<h1>Bem-vindo ao VaultTrack!</h1>
<p>Escolha uma das opções abaixo para acessar os registros.</p>
<hr class="bg-light mt-5">
<div class="row mt-5">
    <div class="col-md-4">
        <a href="{{ route('producoes.index') }}">
            <div class="card card-style mb-4 shadow-sm border-0 rounded-lg br-10">
                <div class="card-body">
                    <h5 class="card-title">Produções Audiovisuais</h5>
                    <p class="card-text small">Registre suas produções audiovisuais e veja suas reviews.</p>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection