<?php

namespace Database\Factories;


use App\Models\Restaurante;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Restaurante>
 */
class RestauranteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre_restaurante' => $this->faker->name(),
            'ubicacion_restaurante' => $this->faker->address(),
            'descripcion_restaurante' => $this->faker->text(),
            'horario_restaurante' => $this->faker->time(),
            'precio_restaurante' => $this->faker->randomFloat(2, 5, 20),
            'valoracion_media' => $this->faker->randomFloat(2, 0, 5),
            'nombre_gerente' => $this->faker->name(),
            'email_gerente' => $this->faker->unique()->safeEmail(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
