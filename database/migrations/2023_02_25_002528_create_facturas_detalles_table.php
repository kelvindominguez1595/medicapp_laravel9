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
        Schema::create('facturas_detalles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('facturas_id');
            $table->unsignedBigInteger('productos_id');
            $table->integer('cantidad_producto');
            $table->integer('cantida_por_dia');
            $table->integer('tipo_de_tratamiento');
            $table->longText('otra_indicacion')->nullable();
            $table->double('descuento', 20, 6);
            $table->double('subtotal', 20, 6);
            $table->foreign('facturas_id')->references('id')->on('facturas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('productos_id')->references('id')->on('productos')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('facturas_detalles');
    }
};
