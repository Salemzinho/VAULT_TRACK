@extends('layouts.app')
@section('title', 'VaultTrack - Literatura')
@section('content')
<div class="container">
    <div class="text-left bg-bluish-purple br-10 p-3">
        <h1 class="font-weight-semibold">📚 Literatura</h1>
        <p class="lead text-muted mt-3 m-0">Preencha o formulário abaixo para editar um livro.</p>
    </div>
    <div class="row mt-5">
        <div class="col-12 col-lg-4 col-md-4">
            <a href="{{ route('literatura.index') }}">
                <div class="card card-style mb-4 shadow-sm border-0 rounded-lg">
                    <div class="card-body text-center">
                        <h6 class="card-title m-0 p-0">Voltar</h6>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <form action="{{ route('literatura.update', $literatura->id) }}" method="POST" enctype="multipart/form-data">
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
                        <!-- Campo Autor -->
                        <div class="mb-3">
                            <label for="autor" class="form-label">Autor*</label>
                            <input type="text" class="form-control" id="autor" name="autor" value="{{ old('autor', $literatura->autor) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Título*</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo', $literatura->titulo) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="data_de_lancamento" class="form-label">Data de Lançamento</label>
                            <input type="date" class="form-control" id="data_de_lancamento" name="data_de_lancamento" value="{{ old('data_de_lancamento', $literatura->data_de_lancamento) }}">
                        </div>
                        <div class="mb-3">
                            <label for="data_de_leitura_inicial" class="form-label">Data de Início da Leitura</label>
                            <input type="date" class="form-control" id="data_de_leitura_inicial" name="data_de_leitura_inicial" value="{{ old('data_de_leitura_inicial', $literatura->data_de_leitura_inicial) }}">
                        </div>
                        <div class="mb-3">
                            <label for="data_de_leitura_final" class="form-label">Data de Término da Leitura</label>
                            <input type="date" class="form-control" id="data_de_leitura_final" name="data_de_leitura_final" value="{{ old('data_de_leitura_final', $literatura->data_de_leitura_final) }}">
                        </div>
                    </div>     
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="banner" class="form-label">Banner</label>
                            <input type="file" class="form-control" id="banner" name="banner">
                            @if($literatura->banner)
                                <small class="d-block mt-2">Banner atual:</small>
                                <img src="{{ asset($literatura->banner) }}" alt="Banner do livro" class="img-fluid rounded" style="max-height: 150px;">
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="review" class="form-label">Review</label>
                            <textarea class="form-control" id="review" name="review" rows="4">{{ old('review', $literatura->review) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="review_link" class="form-label">Link da Review</label>
                            <input type="url" class="form-control" id="review_link" name="review_link" value="{{ old('review_link', $literatura->review_link) }}">
                        </div>
                    </div>
                </div>
                <div class="mt-3 text-right">
                    <button type="submit" class="btn btn-primary">Atualizar Livro</button>
                </div>
            </div>
        </div>
    </form>
    <form action="{{ route('literatura.destroy', $literatura->id) }}" method="POST" class="mt-4">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Excluir Livro</button>
    </form>
</div>
@endsection
