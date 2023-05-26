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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categorias_id');
            $table->string('producto');
            $table->integer('cantidad');
            $table->integer('cantidad_minima');
            $table->boolean('estado');
            $table->char('numero_lote', 100);
            $table->date('fecha_expiracion');
            $table->double('precio_venta', 20, 6);
            $table->foreign('categorias_id')->references('id')->on('categorias')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('productos');
    }
};
