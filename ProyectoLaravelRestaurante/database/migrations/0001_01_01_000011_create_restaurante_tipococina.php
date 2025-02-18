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
        Schema::create('restaurante_tipococina', function (Blueprint $table) {
            $table->id(); // ID único para cada registro en la tabla pivote
            $table->foreignId('restaurante_id')->constrained('restaurantes')->onDelete('cascade');
            $table->foreignId('tipo_cocina_id')->constrained('tipo_cocina')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurante_tipococina');
    }
};