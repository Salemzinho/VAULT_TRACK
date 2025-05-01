<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('banner')->nullable();
            $table->date('data_de_lancamento')->nullable();
            $table->date('data_de_finalizacao')->nullable();
            $table->string('review_link_steam')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
