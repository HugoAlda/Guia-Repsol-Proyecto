<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('resenas', function (Blueprint $table) {
            $table->id('id_resena');
            $table->foreignId('id_user')->constrained('usuarios')->onDelete('cascade');
            $table->foreignId('id_restaurante')->constrained('restaurantes')->onDelete('cascade');
            $table->text('comentario');
            $table->decimal('puntuacion', 3, 2);
            $table->timestamp('fecha_resena')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('resenas');
    }
};