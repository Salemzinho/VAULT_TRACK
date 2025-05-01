@extends('layouts.app')

@section('title', 'Página Inicial')

@section('content')
    <h1 class="my-4">Bem-vindo ao VaultTrack!</h1>
    <p>Escolha uma das opções abaixo para acessar os registros.</p>

    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Produções Audiovisuais">
                <div class="card-body">
                    <h5 class="card-title">Produções Audiovisuais</h5>
                    <p class="card-text">Registre suas produções audiovisuais e veja suas reviews.</p>
                    <a href="{{ route('producoes.index') }}" class="btn btn-primary">Ver Produções</a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card mb-4">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Games">
                <div class="card-body">
                    <h5 class="card-title">Games</h5>
                    <p class="card-text">Registre seus jogos e suas experiências.</p>
                    <a href="{{ route('games.index') }}" class="btn btn-primary">Ver Jogos</a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card mb-4">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Literatura">
                <div class="card-body">
                    <h5 class="card-title">Literatura</h5>
                    <p class="card-text">Mantenha o controle dos livros lidos e suas notas.</p>
                    <a href="{{ route('literatura.index') }}" class="btn btn-primary">Ver Literatura</a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card mb-4">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Exercícios">
                <div class="card-body">
                    <h5 class="card-title">Exercícios</h5>
                    <p class="card-text">Registre os exercícios e monitoramento do seu progresso.</p>
                    <a href="{{ route('exercicios.index') }}" class="btn btn-primary">Ver Exercícios</a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card mb-4">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Consumo de Água">
                <div class="card-body">
                    <h5 class="card-title">Consumo de Água</h5>
                    <p class="card-text">Acompanhe a quantidade de água consumida diariamente.</p>
                    <a href="{{ route('consumo_agua.index') }}" class="btn btn-primary">Ver Consumo</a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card mb-4">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Visitas Gastronômicas">
                <div class="card-body">
                    <h5 class="card-title">Visitas Gastronômicas</h5>
                    <p class="card-text">Registre suas visitas a restaurantes e suas avaliações.</p>
                    <a href="{{ route('visitas.index') }}" class="btn btn-primary">Ver Visitas</a>
                </div>
            </div>
        </div>
    </div>
@endsection
