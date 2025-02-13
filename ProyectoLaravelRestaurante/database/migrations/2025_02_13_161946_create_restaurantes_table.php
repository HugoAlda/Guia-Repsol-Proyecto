<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('restaurantes', function (Blueprint $table) {
            $table->id('id_restaurante');
            $table->string('nombre_restaurante', 100);
            $table->string('ubicacion_restaurante', 191);
            $table->text('descripcion_restaurante')->nullable();
            $table->string('horario_restaurante', 50)->nullable();
            $table->decimal('precio_restaurante', 10, 2)->nullable();
            $table->decimal('valoracion_media', 3, 2)->default(0);
            $table->string('nombre_gerente', 50)->nullable();
            $table->string('email_gerente', 100)->unique()->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('restaurantes');
    }
};