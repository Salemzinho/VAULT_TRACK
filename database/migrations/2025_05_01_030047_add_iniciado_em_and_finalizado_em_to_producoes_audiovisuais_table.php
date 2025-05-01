<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIniciadoEmAndFinalizadoEmToProducoesAudiovisuaisTable extends Migration
{
    /**
     * Execute as alterações da migração.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('producoes_audiovisuais', function (Blueprint $table) {
            $table->date('iniciado_em')->nullable()->after('assistido_em');
            $table->date('finalizado_em')->nullable()->after('iniciado_em');
        });
    }

    /**
     * Reverter as alterações da migração.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('producoes_audiovisuais', function (Blueprint $table) {
            $table->dropColumn(['iniciado_em', 'finalizado_em']);
        });
    }
}
