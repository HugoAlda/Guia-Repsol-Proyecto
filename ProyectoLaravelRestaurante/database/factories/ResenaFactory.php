<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ResenaFactory extends Factory
{
    public function definition()
    {
        return [
            'id_user' => \App\Models\User::factory(), // Crea un usuario si no existe
            'id_restaurante' => \App\Models\Restaurante::factory(), // Crea un restaurante si no existe
            'comentario' => $this->faker->paragraph(),
            'puntuacion' => $this->faker->randomFloat(2, 0, 5),
            'fecha_resena' => $this->faker->dateTimeThisYear()
        ];
    }
}
