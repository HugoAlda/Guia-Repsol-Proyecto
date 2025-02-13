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
        Schema::create('resenas', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
<<<<<<< HEAD:ProyectoLaravelRestaurante/database/migrations/2025_02_13_161947_create_resenas_table.php
=======
=======
>>>>>>> c0020c8920b55cadeac6aa7821c91538c8679f3c
            $table->foreignId('id_users')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_restaurantes')->constrained('restaurantes')->onDelete('cascade');
            $table->text('comentario');
            $table->decimal('puntuacion', 3, 2);
            $table->timestamp('fecha_resena')->useCurrent();
>>>>>>> 341fd7725b20ff9aa3bd069c3d787f637355da8c:ProyectoLaravelRestaurante/database/migrations/0001_01_01_000007_create_resenas_table.php
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resenas');
    }
};
