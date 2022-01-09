<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAndamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('andamentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('matricula_id');
            $table->foreignId('curso_id');
            $table->foreignId('ultima_aula')->nullable()->default(0);
            $table->date('inicio')->nullable();
            $table->date('fim')->nullable();
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
        Schema::dropIfExists('andamentos');
    }
}
