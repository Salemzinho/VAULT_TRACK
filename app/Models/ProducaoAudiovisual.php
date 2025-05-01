<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProducaoAudiovisual extends Model
{
    use HasFactory;

    protected $table = 'producoes_audiovisuais';

    protected $fillable = [
        'titulo', 
        'banner', 
        'data_de_lancamento', 
        'assistido_em', 
        'diretor', 
        'temporada', 
        'quantidade_de_episodios', 
        'review', 
        'review_link_imdb', 
        'review_link_letterbox', 
        'nota_pessoal'
    ];
}