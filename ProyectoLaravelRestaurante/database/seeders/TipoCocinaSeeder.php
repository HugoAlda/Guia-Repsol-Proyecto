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
            'nombre_tipo' => 'Italiana'
        ]);

        TipoCocina::create([
            'nombre_tipo' => 'Mexicana'
        ]);

        TipoCocina::create([
            'nombre_tipo' => 'Arabe'
        ]);

        TipoCocina::create([
            'nombre_tipo' => 'Española'
        ]);

        TipoCocina::create([
            'nombre_tipo' => 'Inglesa'
        ]);

        TipoCocina::create([
            'nombre_tipo' => 'Japonesa'
        ]);

        TipoCocina::create([
            'nombre_tipo' => 'Francesa'
        ]);

        TipoCocina::create([
            'nombre_tipo' => 'China'
        ]);

        TipoCocina::create([
            'nombre_tipo' => 'Estadounidense'
        ]);

        TipoCocina::create([
            'nombre_tipo' => 'Tailandesa'
        ]);
    }
}