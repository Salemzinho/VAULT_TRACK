@extends('layouts.app')
@section('title', 'VaultTrack - Produções Audiovisuais')
@section('content')
<div class="container">
    <div class="text-left bg-bluish-purple br-10 p-3">
        <h1 class="font-weight-semibold">🎬 Produções Audiovisuais</h1>
        <p class="lead text-muted mt-3 m-0">Escolha uma das opções abaixo para acessar os registros.</p>
    </div>
    <form method="GET">
        <div class="bg-bluish-purple br-10 p-3 mt-3">
            <div class="row">
                <div class="col-md-3">
                    <label>Data assistido (início)</label>
                    <input type="date" name="data_inicial" class="form-control" value="{{ $request->data_inicial }}">
                </div>
                <div class="col-md-3">
                    <label>Data assistido (fim)</label>
                    <input type="date" name="data_final" class="form-control" value="{{ $request->data_final }}">
                </div>
                <div class="col-md-2">
                    <label>Nota mínima</label>
                    <input type="number" name="nota_min" min="0" max="10" step="0.1" class="form-control" value="{{ $request->nota_min }}">
                </div>
                <div class="col-md-2">
                    <label>Nota máxima</label>
                    <input type="number" name="nota_max" min="0" max="10" step="0.1" class="form-control" value="{{ $request->nota_max }}">
                </div>
                <div class="col-md-2">
                    <label>Tem review?</label>
                    <select name="tem_review" class="form-control">
                        <option value="">--</option>
                        <option value="1" {{ $request->tem_review ? 'selected' : '' }}>Sim</option>
                    </select>
                </div>
                <div class="col-md-3 mt-2">
                    <label>Lançamento (de)</label>
                    <input type="date" name="lancamento_de" class="form-control" value="{{ $request->lancamento_de }}">
                </div>
                <div class="col-md-3 mt-2">
                    <label>Lançamento (até)</label>
                    <input type="date" name="lancamento_ate" class="form-control" value="{{ $request->lancamento_ate }}">
                </div>
                <div class="col-md-2 mt-4">
                    <button type="submit" class="btn btn-outline-primary w-100 mt-2">Filtrar</button>
                </div>
                <div class="col-md-2 mt-4">
                    <a href="{{ route('producoes.index') }}" class="btn btn-outline-secondary w-100 mt-2">Limpar</a>
                </div>
                <div class="col-md-2 mt-4">
                    <a href="{{ route('producoes.create') }}" class="btn btn-outline-primary w-100 mt-2">Adicionar</a>
                </div>
            </div>
        </div>
    </form>
    @if(session('success'))
    <div class="alert alert-success br-10 mt-3" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <div class="row mt-3">
        @foreach($producoes as $producao)
        <div class="col-10 mb-3">
            <a href="{{ route('producoes.view', $producao->id) }}">
                <div class="card card-style shadow-sm border-0 rounded-lg br-10">
                    <div class="card-body d-flex justify-content-between align-items-start">
                        <div class="text-container">
                            <h6 class="card-title font-weight-semibold">
                                {{ $producao->titulo }} ({{ $producao->data_de_lancamento }}),
                                @if($producao->diretor)
                                    <i class="text-muted">dir. {{ $producao->diretor }}</i>
                                @elseif($producao->temporada && $producao->quantidade_de_episodios)
                                    <i class="text-muted">{{ $producao->temporada }}ª temporada ({{ $producao->quantidade_de_episodios }} episódios)</i>
                                @endif
                            </h6>
                            <p class="card-text small">
                                @if($producao->diretor)
                                    🎬 Assistido em {{ \Carbon\Carbon::parse($producao->assistido_em)->format('d/m/Y') }}
                                @elseif(($producao->temporada && $producao->quantidade_de_episodios) && ($producao->iniciado_em && $producao->finalizado_em))
                                    🌸 Assistido de {{ \Carbon\Carbon::parse($producao->iniciado_em)->format('d/m/Y') }} a {{ \Carbon\Carbon::parse($producao->finalizado_em)->format('d/m/Y') }}
                                @elseif($producao->temporada && $producao->quantidade_de_episodios)
                                    📺 Assistido em {{ \Carbon\Carbon::parse($producao->assistido_em)->format('d/m/Y') }}
                                @endif
                                @if($producao->nota_pessoal)
                                    • ⭐ {{ $producao->nota_pessoal }}
                                @endif
                                @if($producao->review_link_imdb)
                                    • <img src="/img/imdb-logo.png" width="36" height="16" alt="Logo do IMDb" class="rounded">
                                @endif
                            </p>
                        </div>
                        @if($producao->banner)
                            <img src="{{ $producao->banner }}" class="img-fluid rounded" alt="{{ $producao->titulo }}" style="max-width: 34px;">
                        @endif
                    </div>
                </div>
            </a>
        </div>
        <div class="col-2 mb-3">
            <a href="{{ route('producoes.edit', $producao->id) }}">
                <div class="card card-style shadow-sm border-0 rounded-lg mt-3">
                    <div class="text-center mt-3">
                        <p>Editar</p>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
        <div class="col-12 mt-4">
            {{ $producoes->onEachSide(1)->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection