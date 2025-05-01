<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('exercicios', function (Blueprint $table) {
            $table->id();
            $table->string('exercicio');
            $table->integer('tempo_de_execucao')->comment('em minutos');
            $table->decimal('quilos', 5, 2)->comment('peso corporal atual');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exercicios');
    }
};
