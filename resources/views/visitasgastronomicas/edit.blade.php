@extends('layouts.app')
@section('title', 'VaultTrack - Visitas Gastronômicas')
@section('content')
<div class="container">
    <div class="text-left bg-bluish-purple br-10 p-3">
        <h1 class="font-weight-semibold">🍽️ Visitas Gastronômicas</h1>
        <p class="lead text-muted mt-3 m-0">Preencha o formulário abaixo para editar uma visita gastronômica.</p>
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
    <form action="{{ route('visitasgastronomicas.update', $visitaGastronomica->id) }}" method="POST" enctype="multipart/form-data">
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
                            <label for="nome_do_estabelecimento" class="form-label">Nome do Estabelecimento*</label>
                            <input type="text" class="form-control" id="nome_do_estabelecimento" name="nome_do_estabelecimento" value="{{ old('nome_do_estabelecimento', $visitaGastronomica->nome_do_estabelecimento) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="local" class="form-label">Local</label>
                            <input type="text" class="form-control" id="local" name="local" value="{{ old('local', $visitaGastronomica->local) }}">
                        </div>
                        <div class="mb-3">
                            <label for="dia_da_visita" class="form-label">Data da Visita</label>
                            <input type="date" class="form-control" id="dia_da_visita" name="dia_da_visita" value="{{ old('dia_da_visita', $visitaGastronomica->dia_da_visita) }}">
                        </div>
                        <div class="mb-3">
                            <label for="nota_do_ambiente" class="form-label">Nota do Ambiente (0-10)</label>
                            <input type="number" class="form-control" id="nota_do_ambiente" name="nota_do_ambiente" min="0" max="10" step="0.1" value="{{ old('nota_do_ambiente', $visitaGastronomica->nota_do_ambiente) }}">
                        </div>
                    </div>     
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nota_do_servico" class="form-label">Nota do Serviço (0-10)</label>
                            <input type="number" class="form-control" id="nota_do_servico" name="nota_do_servico" min="0" max="10" step="0.1" value="{{ old('nota_do_servico', $visitaGastronomica->nota_do_servico) }}">
                        </div>
                        <div class="mb-3">
                            <label for="nota_da_comida" class="form-label">Nota da Comida (0-10)</label>
                            <input type="number" class="form-control" id="nota_da_comida" name="nota_da_comida" min="0" max="10" step="0.1" value="{{ old('nota_da_comida', $visitaGastronomica->nota_da_comida) }}">
                        </div>
                        <div class="mb-3">
                            <label for="review" class="form-label">Review</label>
                            <textarea class="form-control" id="review" name="review" rows="4">{{ old('review', $visitaGastronomica->review) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="review_link_maps" class="form-label">Link do Google Maps</label>
                            <input type="url" class="form-control" id="review_link_maps" name="review_link_maps" value="{{ old('review_link_maps', $visitaGastronomica->review_link_maps) }}">
                        </div>
                    </div>
                </div>
                <div class="mt-3 text-right">
                    <button type="submit" class="btn btn-primary">Atualizar Visita</button>
                </div>
            </div>
        </div>
    </form>
    <form action="{{ route('visitasgastronomicas.destroy', $visitaGastronomica->id) }}" method="POST" class="mt-4">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Excluir Visita</button>
    </form>
</div>
@endsection
