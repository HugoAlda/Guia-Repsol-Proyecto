<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RestauranteFactory extends Factory
{
    public function definition()
    {
        return [
            'nombre_restaurante' => $this->faker->company(),
            'ubicacion_restaurante' => $this->faker->address(),
            'descripcion_restaurante' => $this->faker->text(200),
            'horario_restaurante' => $this->faker->randomElement(['10:00 - 22:00', '12:00 - 00:00', '08:00 - 20:00', '8:00 - 23:00', '7:00 - 16:30', '9:00 - 00:00', '17:00 - 02:30']),
            'precio_restaurante' => $this->faker->randomFloat(2, 5, 100),
            'valoracion_media' => $this->faker->randomFloat(2, 0, 5),
            'nombre_gerente' => $this->faker->name(),
            'email_gerente' => $this->faker->unique()->safeEmail()
        ];
    }
}