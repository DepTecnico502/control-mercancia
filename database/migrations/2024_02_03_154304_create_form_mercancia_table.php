<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('form_mercancia', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transporte_id')->constrained()->onUpdate('cascade');
            $table->string('no_guia');
            $table->string('bultos');
            $table->double('monto')->nullable();
            $table->foreignId('proveedor_id')->references('id')->on('proveedores')->onUpdate('cascade');
            $table->foreignId('recibido_id')->constrained()->onUpdate('cascade');
            $table->string('no_pedido');
            $table->string('imagen_doc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_mercancia');
    }
};
