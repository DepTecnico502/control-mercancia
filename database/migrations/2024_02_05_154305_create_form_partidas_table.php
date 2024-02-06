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
        Schema::create('form_partidas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mercancia_id')->references('id')->on('form_mercancia')->onUpdate('cascade');
            $table->string('no_partida');
            $table->string('url_imagen')->nullable();
            $table->string('comentario')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_partidas');
    }
};
