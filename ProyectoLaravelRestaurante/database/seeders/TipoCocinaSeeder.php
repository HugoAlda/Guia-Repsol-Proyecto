<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\TipoCocina;
use Illuminate\Database\Seeder;

class TipoCocinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipoCocina::create([
            'nombre_tipo' => 'Italiana',
            'id_restaurantes' => 1,
        ]);

        TipoCocina::create([
            'nombre_tipo' => 'Mexicana',
            'id_restaurantes' => 2,
        ]);

        TipoCocina::create([
            'nombre_tipo' => 'Arabe',
            'id_restaurantes' => 3,
        ]);

        TipoCocina::create([
            'nombre_tipo' => 'Española',
            'id_restaurantes' => 4,
        ]);

        TipoCocina::create([
            'nombre_tipo' => 'Inglesa',
            'id_restaurantes' => 5,
        ]);

        TipoCocina::create([
            'nombre_tipo' => 'Japonesa',
            'id_restaurantes' => 6,
        ]);

        TipoCocina::create([
            'nombre_tipo' => 'Francesa',
            'id_restaurantes' => 7,
        ]);

        TipoCocina::create([
            'nombre_tipo' => 'China',
            'id_restaurantes' => 8,
        ]);

        TipoCocina::create([
            'nombre_tipo' => 'Estadounidense',
            'id_restaurantes' => 9,
        ]);

        TipoCocina::create([
            'nombre_tipo' => 'Tailandesa',
            'id_restaurantes' => 10,
        ]);

    }
}
