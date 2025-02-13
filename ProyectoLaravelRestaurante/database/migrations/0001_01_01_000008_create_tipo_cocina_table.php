<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tipo_cocina', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_tipo', 50);
            $table->foreignId('id_restaurantes')->constrained('restaurantes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tipo_cocina');
    }
};