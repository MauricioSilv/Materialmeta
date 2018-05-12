<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmprestimoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emprestimo', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('material_id')->unsigned();
            $table->foreign('material_id')->references('id')->on('material');
            // $table->integer('professor_id')->unsigned();
            // $table->foreign('professor_id')->references('id')->on('professor');
            $table->dateTime('devolucao')->nullable();
            $table->string('status_emprestimo');
            $table->dateTime('data_emprestimo');
            $table->dateTime('data_agendamento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emprestimo');
    }
}
