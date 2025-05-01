<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'VaultTrack')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="/css/main.css" rel="stylesheet">
</head>
<body>

<div class="sidebar">
    <a href="/">
        <h2 class="text-white mb-5">VaultTrack</h2>
    </a>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home.index') }}">Início</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('producoes.index') }}">Produções Audiovisuais</a>
        </li>
<!--
        <li class="nav-item">
            <a class="nav-link" href="{{-- route('games.index') --}}">Games</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{-- route('literatura.index') --}}">Literatura</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{-- route('exercicios.index') --}}">Exercícios</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{-- route('consumo_agua.index') --}}">Consumo de Água</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{-- route('visitas.index') --}}">Visitas Gastronômicas</a>
        </li>
-->
    </ul>
</div>

    <main class="main-content">
        @yield('content')
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
