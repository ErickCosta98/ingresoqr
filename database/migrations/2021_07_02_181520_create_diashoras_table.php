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
            $table->foreign('fk_grupoid')->references('id')->on('grupos');
            $table->integer('nombreDia');
            $table->time('entrada',$precision = 0);
            $table->time('salida',$precision = 0);
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
