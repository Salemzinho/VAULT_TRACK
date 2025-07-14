@extends('layouts.app')
@section('title', 'VaultTrack - Shows')
@section('content')
<div class="container">
    <div class="text-left bg-bluish-purple br-10 p-3">
        <h1 class="font-weight-semibold">🎤 Shows</h1>
        <p class="lead text-muted mt-3 m-0">Preencha o formulário abaixo para cadastrar um novo show.</p>
    </div>
    <div class="row mt-5">
        <div class="col-12 col-lg-4 col-md-4">
            <a href="{{ route('shows.index') }}">
                <div class="card card-style mb-4 shadow-sm border-0 rounded-lg">
                    <div class="card-body text-center">
                        <h6 class="card-title m-0 p-0">Voltar</h6>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <form action="{{ route('shows.store') }}" method="POST" enctype="multipart/form-data">
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
                            <label for="dia_do_show" class="form-label">Dia do Show</label>
                            <input type="date" class="form-control" id="dia_do_show" name="dia_do_show">
                        </div>
                        <div class="mb-3">
                            <label for="artista" class="form-label">Artista(s)</label>
                            <textarea class="form-control" id="artista" name="artista" rows="2"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="setlist" class="form-label">Setlist</label>
                            <textarea class="form-control" id="setlist" name="setlist" rows="4"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="link_video" class="form-label">Link do Vídeo</label>
                            <input type="url" class="form-control" id="link_video" name="link_video">
                        </div>
                    </div>     
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="flyer_vertical" class="form-label">Flyer Vertical</label>
                            <input type="file" class="form-control" id="flyer_vertical" name="flyer_vertical">
                        </div>
                        <div class="mb-3">
                            <label for="flyer_horizontal" class="form-label">Flyer Horizontal</label>
                            <input type="file" class="form-control" id="flyer_horizontal" name="flyer_horizontal">
                        </div>
                        <div class="mb-3">
                            <label for="fotos" class="form-label">Fotos (pode selecionar várias)</label>
                            <input type="file" class="form-control" id="fotos" name="fotos[]" multiple>
                        </div>
                        <div class="mb-3">
                            <label for="foto_artista" class="form-label">Foto do Artista</label>
                            <input type="file" class="form-control" id="foto_artista" name="foto_artista">
                        </div>
                    </div>
                </div>
                <div class="mt-3 text-right">
                    <button type="submit" class="btn btn-success">Adicionar Show</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
