@extends('layouts.app')
@section('title', 'VaultTrack - Games')
@section('content')
<div class="text-left bg-bluish-purple br-10 p-3">
    <h1 class="font-weight-semibold">🎮 Games</h1>
    <p class="lead text-muted mt-3 m-0">Preencha o formulário abaixo para editar um novo game.</p>
</div>
<div class="row mt-5">
    <div class="col-12 col-lg-4 col-md-4">
        <a href="{{ route('games.index') }}">
            <div class="card card-style mb-4 shadow-sm border-0 rounded-lg">
                <div class="card-body text-center">
                    <h6 class="card-title m-0 p-0">Voltar</h6>
                </div>
            </div>
        </a>
    </div>
</div>
<form action="{{ route('games.update', $game->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="card bg-bluish-purple mt-3 br-10">
        <div class="card-body">
            @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título*</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo', $game->titulo) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="data_de_lancamento" class="form-label">Ano de Lançamento</label>
                        <input type="number" class="form-control" id="data_de_lancamento" name="data_de_lancamento" min="1900" max="{{ date('Y') }}" value="{{ old('data_de_lancamento', $game->data_de_lancamento) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="data_de_finalizacao" class="form-label">Finalizado em</label>
                        <input type="date" class="form-control" id="data_de_finalizacao" name="data_de_finalizacao" value="{{ old('data_de_finalizacao', $game->data_de_finalizacao) }}">
                    </div>
                    <div class="mb-3">
                        <label for="plataforma" class="form-label">Plataforma</label>
                        <select class="form-control" id="plataforma" name="plataforma">
                            <option value="PC" {{ old('plataforma', $game->plataforma) == 'PC' ? 'selected' : '' }}>PC</option>
                            <option value="Console" {{ old('plataforma', $game->plataforma) == 'Console' ? 'selected' : '' }}>Console</option>
                        </select>
                    </div>
                </div>     
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="banner" class="form-label">Banner</label>
                        <input type="file" class="form-control" id="banner" name="banner">
                        @if($game->banner)
                            <small class="d-block mt-2">Banner atual:</small>
                            <img src="{{ asset($game->banner) }}" alt="Banner do Game" class="img-fluid rounded" style="max-height: 150px;">
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="review" class="form-label">Review</label>
                        <textarea class="form-control" id="review" name="review" rows="4">{{ old('review', $game->review) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="review_link_steam" class="form-label">Link para o Steam</label>
                        <input type="url" class="form-control" id="review_link_steam" name="review_link_steam" value="{{ old('review_link_steam', $game->review_link_steam) }}">
                    </div>
                </div>
            </div>
            <div class="mt-3 text-right">
                <button type="submit" class="btn btn-primary">Atualizar Game</button>
            </div>
        </div>
    </div>
</form>
<form action="{{ route('games.destroy', $game->id) }}" method="POST" class="mt-4">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Excluir Game</button>
</form>
@endsection
