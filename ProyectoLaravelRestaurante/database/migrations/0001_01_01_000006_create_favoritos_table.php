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
        Schema::create('favoritos', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD:ProyectoLaravelRestaurante/database/migrations/2025_02_13_161947_create_favoritos_table.php
=======
            $table->foreignId('id_users')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_restaurantes')->constrained('restaurantes')->onDelete('cascade');
>>>>>>> 341fd7725b20ff9aa3bd069c3d787f637355da8c:ProyectoLaravelRestaurante/database/migrations/0001_01_01_000006_create_favoritos_table.php
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favoritos');
    }
};
