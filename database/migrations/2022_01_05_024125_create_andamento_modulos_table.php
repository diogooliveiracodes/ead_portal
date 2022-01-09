<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAndamentoModulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('andamento_modulos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('matricula_id');
            $table->foreignId('curso_id');
            $table->foreignId('modulo_id');
            $table->foreignId('ultima_aula')->nullable()->default(0);
            $table->integer('quantidade_aulas')->nullable();
            $table->integer('aulas_concluidas')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('andamento_modulos');
    }
}
