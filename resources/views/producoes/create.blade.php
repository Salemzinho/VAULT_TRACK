@extends('layouts.app')
@section('title', 'VaultTrack - Produções Audiovisuais')
@section('content')
<h1>Adicionar Produção Audiovisual</h1>
<p>Preencha o formulário abaixo para cadastrar uma nova produção audiovisual.</p>
<hr class="bg-light mt-5">
<form action="{{ route('producoes.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card bg-transparent border-white mt-5 br-10">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título*</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" required>
                    </div>

                    <div class="mb-3">
                        <label for="data_de_lancamento" class="form-label">Ano de Lançamento</label>
                        <input type="number" class="form-control" id="data_de_lancamento" name="data_de_lancamento" min="1900" max="{{ date('Y') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="assistido_em" class="form-label">Assistido em</label>
                        <input type="date" class="form-control" id="assistido_em" name="assistido_em">
                    </div>

                    <div class="mb-3">
                        <label for="diretor" class="form-label">Diretor</label>
                        <input type="text" class="form-control" id="diretor" name="diretor">
                    </div>

                    <div class="mb-3">
                        <label for="review_link_imdb" class="form-label">Link para o IMDb</label>
                        <input type="url" class="form-control" id="review_link_imdb" name="review_link_imdb">
                    </div>


                    <div class="mb-3">
                        <label for="review_link_letterbox" class="form-label">Link para Letterboxd</label>
                        <input type="url" class="form-control" id="review_link_letterbox" name="review_link_letterbox">
                    </div>
                </div>     

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="temporada" class="form-label">Temporada</label>
                        <input type="number" class="form-control" id="temporada" name="temporada">
                    </div>

                    <div class="mb-3">
                        <label for="quantidade_de_episodios" class="form-label">Quantidade de Episódios</label>
                        <input type="number" class="form-control" id="quantidade_de_episodios" name="quantidade_de_episodios">
                    </div>

                    <div class="mb-3">
                        <label for="banner" class="form-label">Banner</label>
                        <input type="file" class="form-control" id="banner" name="banner">
                    </div>

                    <div class="mb-3">
                        <label for="review" class="form-label">Review</label>
                        <textarea class="form-control" id="review" name="review" rows="4"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="nota_pessoal" class="form-label">Nota Pessoal</label>
                        <input type="number" class="form-control" id="nota_pessoal" name="nota_pessoal" min="1" max="10">
                    </div>
                </div>
            </div>

            <div class="mt-3 text-right">
                <button type="submit" class="btn btn-success">Adicionar Produção</button>
            </div>
        </div>
    </div>
</form>
@endsection