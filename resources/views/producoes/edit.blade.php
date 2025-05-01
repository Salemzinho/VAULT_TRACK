@extends('layouts.app')
@section('title', 'VaultTrack - Produções Audiovisuais')
@section('content')
<div class="container">
    <div class="text-left bg-bluish-purple br-10 p-3">
        <h1 class="font-weight-semibold">🎬 Produções Audiovisuais</h1>
        <p class="lead text-muted mt-3 m-0">Preencha o formulário abaixo para editar uma nova produção audiovisual.</p>
    </div>
    <div class="row mt-5">
        <div class="col-12 col-lg-4 col-md-4">
            <a href="{{ route('producoes.index') }}">
                <div class="card card-style mb-4 shadow-sm border-0 rounded-lg">
                    <div class="card-body text-center">
                        <h6 class="card-title m-0 p-0">Voltar</h5>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <form action="{{ route('producoes.update', $producao->id) }}" method="POST" enctype="multipart/form-data">
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
                            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo', $producao->titulo) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="data_de_lancamento" class="form-label">Ano de Lançamento</label>
                            <input type="number" class="form-control" id="data_de_lancamento" name="data_de_lancamento" min="1900" max="{{ date('Y') }}" value="{{ old('data_de_lancamento', $producao->data_de_lancamento) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="assistido_em" class="form-label">Assistido em</label>
                            <input type="date" class="form-control" id="assistido_em" name="assistido_em" value="{{ old('assistido_em', $producao->assistido_em) }}">
                        </div>
                        <div class="mb-3">
                            <label for="diretor" class="form-label">Diretor</label>
                            <input type="text" class="form-control" id="diretor" name="diretor" value="{{ old('diretor', $producao->diretor) }}">
                        </div>
                        <div class="mb-3">
                            <label for="review_link_imdb" class="form-label">Link para o IMDb</label>
                            <input type="url" class="form-control" id="review_link_imdb" name="review_link_imdb" value="{{ old('review_link_imdb', $producao->review_link_imdb) }}">
                        </div>
                        <div class="mb-3">
                            <label for="review_link_letterbox" class="form-label">Link para Letterboxd</label>
                            <input type="url" class="form-control" id="review_link_letterbox" name="review_link_letterbox" value="{{ old('review_link_letterbox', $producao->review_link_letterbox) }}">
                        </div>
                        <div class="mb-3">
                            <label for="iniciado_em" class="form-label">Iniciado em</label>
                            <input type="date" class="form-control" id="iniciado_em" name="iniciado_em" value="{{ old('iniciado_em', $producao->iniciado_em) }}">
                        </div>
                    </div>     
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="temporada" class="form-label">Temporada</label>
                            <input type="number" class="form-control" id="temporada" name="temporada" value="{{ old('temporada', $producao->temporada) }}">
                        </div>
                        <div class="mb-3">
                            <label for="quantidade_de_episodios" class="form-label">Quantidade de Episódios</label>
                            <input type="number" class="form-control" id="quantidade_de_episodios" name="quantidade_de_episodios" value="{{ old('quantidade_de_episodios', $producao->quantidade_de_episodios) }}">
                        </div>
                        <div class="mb-3">
                            <label for="banner" class="form-label">Banner</label>
                            <input type="file" class="form-control" id="banner" name="banner">
                            @if($producao->banner)
                                <div class="mt-3">
                                    <img src="{{ $producao->banner }}" alt="Banner Atual" style="width: 100px; height: auto;">
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="review" class="form-label">Review</label>
                            <textarea class="form-control" id="review" name="review" rows="4">{{ old('review', $producao->review) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="nota_pessoal" class="form-label">Nota Pessoal</label>
                            <input type="number" class="form-control" id="nota_pessoal" name="nota_pessoal" min="1" max="10" value="{{ old('nota_pessoal', $producao->nota_pessoal) }}">
                        </div>
                        <div class="mb-3">
                            <label for="finalizado_em" class="form-label">Finalizado em</label>
                            <input type="date" class="form-control" id="finalizado_em" name="finalizado_em" value="{{ old('finalizado_em', $producao->finalizado_em) }}">
                        </div>
                    </div>
                </div>
                <div class="mt-3 text-right">
                    <button type="submit" class="btn btn-success">Salvar Alterações</button>
                </div>
            </div>
        </div>
    </form>
    <form action="{{ route('producoes.destroy', $producao->id) }}" method="POST" class="mt-4">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Excluir Produção</button>
    </form>
</div>
@endsection
