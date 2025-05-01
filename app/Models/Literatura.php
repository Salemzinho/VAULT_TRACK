<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Literatura extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'data_de_lancamento',
        'data_de_leitura_inicial',
        'data_de_leitura_final',
        'banner',
        'review',
        'review_link',
    ];
}
