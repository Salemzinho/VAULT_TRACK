<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('literatura', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->date('data_de_lancamento')->nullable();
            $table->date('data_de_leitura_inicial')->nullable();
            $table->date('data_de_leitura_final')->nullable();
            $table->string('banner')->nullable();
            $table->text('review')->nullable();
            $table->string('review_link')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('literatura');
    }
};
