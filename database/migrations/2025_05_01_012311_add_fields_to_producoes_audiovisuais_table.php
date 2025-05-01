<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToProducoesAudiovisuaisTable extends Migration
{
    /**
     * Execute as migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('producoes_audiovisuais', function (Blueprint $table) {
            // Adicionando as novas colunas
            $table->string('diretor')->nullable();
            $table->integer('temporada')->nullable();
            $table->integer('quantidade_de_episodios')->nullable();
        });
    }

    /**
     * Reverter as migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('producoes_audiovisuais', function (Blueprint $table) {
            // Removendo as colunas
            $table->dropColumn('diretor');
            $table->dropColumn('temporada');
            $table->dropColumn('quantidade_de_episodios');
        });
    }
}
