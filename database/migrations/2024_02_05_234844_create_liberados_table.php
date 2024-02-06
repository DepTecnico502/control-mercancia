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
        Schema::create('liberados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mercancia_id')->references('id')->on('form_mercancia')->onUpdate('cascade');
            $table->foreignId('partida_id')->references('id')->on('form_partidas')->onUpdate('cascade');
            $table->string('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('liberados');
    }
};
