<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('visitas_gastronomicas', function (Blueprint $table) {
            $table->id();
            $table->string('nome_do_estabelecimento');
            $table->string('local')->nullable();
            $table->date('dia_da_visita')->nullable();
            $table->tinyInteger('nota_do_ambiente')->nullable();
            $table->tinyInteger('nota_do_servico')->nullable();
            $table->tinyInteger('nota_da_comida')->nullable();
            $table->text('review')->nullable();
            $table->string('review_link_maps')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('visitas_gastronomicas');
    }
};
