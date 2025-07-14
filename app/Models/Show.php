<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    use HasFactory;

    protected $table = 'shows';

    protected $fillable = [
        'nome_do_estabelecimento',
        'local',
        'artistas',
        'dia_do_show',
        'setlist',
        'link_video',
        'flyer_vertical',
        'flyer_horizontal',
        'fotos',
        'foto_artista',
    ];
}