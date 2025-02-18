<?php

namespace Database\Seeders;

use App\Models\Restaurante;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolSeeder::class,
            UserSeeder::class,
            ComunidadAutonomaSeeder::class,
            ProvinciaSeeder::class,
            RestauranteSeeder::class,
            FavoritosSeeder::class,
            ResenaSeeder::class,
            TipoCocinaSeeder::class,
            RestauranteTipoCocinaSeeder::class
        ]);
    }
}
