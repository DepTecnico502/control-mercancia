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
        Schema::create('listado_precios', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->text('descripcion');
            $table->integer('existencias');
            $table->string('codigo_barras')->nullable();
            $table->string('grupo_articulos');
            $table->string('fabricante');
            $table->string('unidad_de_medida');
            $table->double('ultimo_precio_compra');
            $table->double('ultimo_precio_entrada_mercancia');
            $table->double('inusual');
            $table->double('frecuente');
            $table->double('mayorista');
            $table->double('socio');
            $table->integer('estado')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listado_precios');
    }
};
