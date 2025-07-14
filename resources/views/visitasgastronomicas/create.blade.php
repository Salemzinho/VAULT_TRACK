@extends('layouts.app')
@section('title', 'VaultTrack - Visitas Gastronômicas')
@section('content')
<div class="container">
    <div class="text-left bg-bluish-purple br-10 p-3">
        <h1 class="font-weight-semibold">🍽️ Visitas Gastronômicas</h1>
        <p class="lead text-muted mt-3 m-0">Preencha o formulário abaixo para cadastrar uma nova visita.</p>
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
    <form action="{{ route('visitasgastronomicas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card bg-bluish-purple mt-3 br-10">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nome_do_estabelecimento" class="form-label">Nome do Estabelecimento*</label>
                            <input type="text" class="form-control" id="nome_do_estabelecimento" name="nome_do_estabelecimento" required>
                        </div>
                        <div class="mb-3">
                            <label for="local" class="form-label">Local</label>
                            <input type="text" class="form-control" id="local" name="local">
                        </div>
                        <div class="mb-3">
                            <label for="dia_da_visita" class="form-label">Data da Visita</label>
                            <input type="date" class="form-control" id="dia_da_visita" name="dia_da_visita">
                        </div>
                        <div class="mb-3">
                            <label for="nota_do_ambiente" class="form-label">Nota do Ambiente (0-10)</label>
                            <input type="number" class="form-control" id="nota_do_ambiente" name="nota_do_ambiente" min="0" max="10" step="0.1">
                        </div>
                    </div>     
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nota_do_servico" class="form-label">Nota do Serviço (0-10)</label>
                            <input type="number" class="form-control" id="nota_do_servico" name="nota_do_servico" min="0" max="10" step="0.1">
                        </div>
                        <div class="mb-3">
                            <label for="nota_da_comida" class="form-label">Nota da Comida (0-10)</label>
                            <input type="number" class="form-control" id="nota_da_comida" name="nota_da_comida" min="0" max="10" step="0.1">
                        </div>
                        <div class="mb-3">
                            <label for="review" class="form-label">Review</label>
                            <textarea class="form-control" id="review" name="review" rows="4"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="review_link_maps" class="form-label">Link do Google Maps</label>
                            <input type="url" class="form-control" id="review_link_maps" name="review_link_maps">
                        </div>
                    </div>
                </div>
                <div class="mt-3 text-right">
                    <button type="submit" class="btn btn-success">Adicionar Visita</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
