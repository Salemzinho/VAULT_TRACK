<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('shows', function (Blueprint $table) {
            $table->id();
            $table->string('nome_do_estabelecimento');
            $table->string('local')->nullable();
            $table->text('artista')->nullable();
            $table->date('dia_do_show')->nullable();
            $table->text('setlist')->nullable();
            $table->string('link_video')->nullable();
            $table->string('flyer_vertical')->nullable();
            $table->string('flyer_horizontal')->nullable();
            $table->text('fotos')->nullable();
            $table->string('foto_artista')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shows');
    }
};