<?php

namespace Database\Seeders;

use App\Models\Restaurante;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestauranteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Restaurante::factory(10)->create();
        Restaurante::create([
            'nombre_restaurante' => 'Mc Donalds',
            'ubicacion_restaurante' => 'Carrera 123, 456, Ciudad',
            'descripcion_restaurante' => 'Este es un restaurante de comida rápida y saborosa.',
            'horario_restaurante' => 'Lunes a Viernes: 11:00 AM a 1:00 PM, Sábado y Domingo: 11:00 AM a 3:00 PM',
            'precio_restaurante' => 15.00,
            'valoracion_media' => 4.5,
            'img_restaurante' => 'mc_donalds.png',
            'nombre_gerente' => 'Gerente',
            'email_gerente' => 'gerente@example.com',
        ]);
    }
}
