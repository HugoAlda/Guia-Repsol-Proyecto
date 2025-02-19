<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('restaurantes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_restaurante', 100);
            $table->string('ubicacion_restaurante', 191);
            $table->text('descripcion_restaurante')->nullable();
            $table->string('horario_restaurante', 200)->nullable();
            $table->decimal('precio_restaurante', 10, 2)->nullable();
            $table->decimal('valoracion_media', 3, 2)->default(0);
            $table->string('img_restaurante')->nullable();
            $table->string('nombre_gerente', 50)->nullable();
            $table->string('email_gerente', 100)->nullable();
            $table->foreignId('id_comunidad_autonoma')->constrained('comunidad_autonoma')->onDelete('cascade');
            $table->foreignId('id_provincia')->constrained('provincia')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('restaurantes');
    }
};