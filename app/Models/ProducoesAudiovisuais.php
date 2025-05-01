<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProducoesAudiovisuais extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'banner',
        'data_de_lancamento',
        'assistido_em',
        'review',
        'review_link_imdb',
        'review_link_letterbox',
        'nota_pessoal',
    ];
}
