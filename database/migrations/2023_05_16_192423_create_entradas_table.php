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
        Schema::create('entradas', function (Blueprint $table) {
            $table->id('codigo');
            $table->bigInteger('id_producto')->unsigned();
            $table->foreign('id_producto')->references('codigo')->on('productos');
            $table->bigInteger('id_proveedor')->unsigned();
            $table->foreign('id_proveedor')->references('codigo')->on('proveedores');
            $table->bigInteger('id_bodega')->unsigned();
            $table->foreign('id_bodega')->references('codigo')->on('bodegas');
            $table->date('fecha');
            $table->double('precio_adquisicion',8,2);
            $table->integer('cantidad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entradas');
    }
};
