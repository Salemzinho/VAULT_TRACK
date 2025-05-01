<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('consumo_agua', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->decimal('litros', 4, 2)->comment('litros de água consumidos');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('consumo_agua');
    }
};