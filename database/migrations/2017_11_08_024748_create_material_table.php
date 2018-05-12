<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nome');
            $table->string('marca');
            $table->integer('status_material');
            $table->integer('estado_material_id')->unsigned();
            $table->foreign('estado_material_id')->references('id')->on('estadomaterial');
             $table->integer('tipo_material_id')->unsigned();
            $table->foreign('tipo_material_id')->references('id')->on('tipomaterial');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('material');
    }
}
