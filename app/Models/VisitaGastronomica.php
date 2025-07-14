<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitaGastronomica extends Model
{
    use HasFactory;

    protected $table = 'visitas_gastronomicas';

    protected $fillable = [
        'nome_do_estabelecimento',
        'local',
        'dia_da_visita',
        'nota_do_ambiente',
        'nota_do_servico',
        'nota_da_comida',
        'review',
        'review_link_maps',
    ];
}
