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
        Schema::create('restaurantes', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD:ProyectoLaravelRestaurante/database/migrations/2025_02_13_161946_create_restaurantes_table.php
=======
            $table->unsignedBigInteger('id_restaurantes');
            $table->string('nombre_restaurante', 100);
            $table->string('ubicacion_restaurante', 191);
            $table->text('descripcion_restaurante')->nullable();
            $table->string('horario_restaurante', 50)->nullable();
            $table->decimal('precio_restaurante', 10, 2)->nullable();
            $table->decimal('valoracion_media', 3, 2)->default(0);
            $table->string('nombre_gerente', 50)->nullable();
            $table->string('email_gerente', 100)->unique()->nullable();
>>>>>>> 341fd7725b20ff9aa3bd069c3d787f637355da8c:ProyectoLaravelRestaurante/database/migrations/0001_01_01_000005_create_restaurantes_table.php
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurantes');
    }
};
