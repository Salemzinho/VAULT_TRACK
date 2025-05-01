<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'VaultTrack')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('home') }}">
                                <i class="fas fa-home"></i> Início
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('producoes.index') }}">
                                <i class="fas fa-video"></i> Produções Audiovisuais
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('games.index') }}">
                                <i class="fas fa-gamepad"></i> Games
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('literatura.index') }}">
                                <i class="fas fa-book"></i> Literatura
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('exercicios.index') }}">
                                <i class="fas fa-dumbbell"></i> Exercícios
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('consumo_agua.index') }}">
                                <i class="fas fa-tint"></i> Consumo de Água
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('visitas.index') }}">
                                <i class="fas fa-utensils"></i> Visitas Gastronômicas
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
