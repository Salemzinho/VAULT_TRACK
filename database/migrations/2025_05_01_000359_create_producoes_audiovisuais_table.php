<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('producoes_audiovisuais', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('banner')->nullable();
            $table->date('data_de_lancamento')->nullable();
            $table->date('assistido_em')->nullable();
            $table->text('review')->nullable();
            $table->string('review_link_imdb')->nullable();
            $table->string('review_link_letterbox')->nullable();
            $table->tinyInteger('nota_pessoal')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('producoes_audiovisuais');
    }
};