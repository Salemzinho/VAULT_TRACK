<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'banner',
        'data_de_lancamento',
        'data_de_finalizacao',
        'review_link_steam',
    ];
}
