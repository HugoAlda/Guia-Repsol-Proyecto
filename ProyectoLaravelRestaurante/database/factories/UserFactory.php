<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    public function definition()
    {
        return [
            'username' => $this->faker->unique()->userName(),
            'nombre_user' => $this->faker->firstName(),
            'apellidos_user' => $this->faker->lastName(),
            'email_user' => $this->faker->unique()->safeEmail(),
            'pwd_user' => Hash::make('password'), // Hasheado para seguridad
            'id_rol' => 2 // Suponiendo que 1 = admin, 2 = usuario normal
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
