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
            $table->unsignedBigInteger('restaurante_id'); // ID del restaurante
            $table->unsignedBigInteger('tipo_cocina_id'); // ID del tipo de cocina
            $table->timestamps(); // Columnas created_at y updated_at

            // Definir las claves foráneas
            $table->foreign('restaurante_id')->references('id')->on('restaurantes')->onDelete('cascade');
            $table->foreign('tipo_cocina_id')->references('id')->on('tipos_cocina')->onDelete('cascade');
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