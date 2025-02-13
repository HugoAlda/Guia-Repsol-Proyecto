<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
<<<<<<< HEAD
    /**
     * Run the migrations.
     */
=======
>>>>>>> c0020c8920b55cadeac6aa7821c91538c8679f3c
    public function up(): void
    {
        Schema::create('favoritos', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
<<<<<<< HEAD:ProyectoLaravelRestaurante/database/migrations/2025_02_13_161947_create_favoritos_table.php
=======
            $table->foreignId('id_users')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_restaurantes')->constrained('restaurantes')->onDelete('cascade');
>>>>>>> 341fd7725b20ff9aa3bd069c3d787f637355da8c:ProyectoLaravelRestaurante/database/migrations/0001_01_01_000006_create_favoritos_table.php
=======
            $table->foreignId('id_users')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_restaurantes')->constrained('restaurantes')->onDelete('cascade');
>>>>>>> c0020c8920b55cadeac6aa7821c91538c8679f3c
            $table->timestamps();
        });
    }

<<<<<<< HEAD
    /**
     * Reverse the migrations.
     */
=======
>>>>>>> c0020c8920b55cadeac6aa7821c91538c8679f3c
    public function down(): void
    {
        Schema::dropIfExists('favoritos');
    }
<<<<<<< HEAD
};
=======
};
>>>>>>> c0020c8920b55cadeac6aa7821c91538c8679f3c
