<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiashorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diashoras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_grupoid');
            $table->foreign('fk_grupoid')->references('id_grupo')->on('grupos');
            $table->string('nombreDia');
            $table->time('entrada');
            $table->time('salida');
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
        Schema::dropIfExists('diashoras');
    }
}
