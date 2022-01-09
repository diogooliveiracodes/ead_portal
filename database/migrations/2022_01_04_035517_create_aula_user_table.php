<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAulaUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aula_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aula_id');
            $table->foreignId('user_id');
            $table->foreignId('andamento_id');
            $table->foreignId('modulo_id');
            $table->foreignId('curso_id');
            $table->boolean('concluido')->default(0);
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
        Schema::dropIfExists('aula_user');
    }
}
