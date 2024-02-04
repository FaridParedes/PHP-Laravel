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
        Schema::create('marcasproductos', function (Blueprint $table) {
            $table->bigInteger('id_producto')->unsigned();
            $table->foreign('id_producto')->references('codigo')->on('productos');
            $table->bigInteger('id_marca')->unsigned();
            $table->foreign('id_marca')->references('codigo')->on('marcas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marcasproductos');
    }
};
