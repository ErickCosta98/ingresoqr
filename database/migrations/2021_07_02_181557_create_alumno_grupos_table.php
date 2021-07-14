<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnoGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno_grupos', function (Blueprint $table) {
            $table->unsignedBigInteger('fk_alumnoid');
            $table->unsignedBigInteger('fk_grupoid');
            $table->foreign('fk_alumnoid')->references('id')->on('alumnos');
            $table->foreign('fk_grupoid')->references('id')->on('grupos');
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
        Schema::dropIfExists('alumno_grupos');
    }
}
