<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reparaciones', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->id();
            $table->dateTime('start');
            $table->dateTime('end');
            $table->bigInteger('tecnico_id')->unsigned();
            $table->bigInteger('maquina_id')->unsigned();
            $table->timestamps();
            //relacion uno a muchos inversa
            $table->foreign("tecnico_id")->references('id')->on('tecnicos');
            $table->foreign("maquina_id")->references('id')->on('maquinas');
        });
    }

    /**npm
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reparaciones');
    }
};
