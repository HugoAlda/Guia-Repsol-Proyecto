<?php

namespace Database\Seeders;
use App\Models\ComunidadAutonoma;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use function Ramsey\Uuid\v1;

class ComunidadAutonomaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comunidades = [
            ['nombre_comunidad' => 'Andalucía'],
            ['nombre_comunidad' => 'Aragón'],
            ['nombre_comunidad' => 'Asturias'],
            ['nombre_comunidad' => 'Baleares'],
            ['nombre_comunidad' => 'Canarias'],
            ['nombre_comunidad' => 'Cantabria'],
            ['nombre_comunidad' => 'Castilla-La Mancha'],
            ['nombre_comunidad' => 'Castilla y León'],
            ['nombre_comunidad' => 'Cataluña'],
            ['nombre_comunidad' => 'Ceuta'],
            ['nombre_comunidad' => 'Comunidad Valenciana'],
            ['nombre_comunidad' => 'Extremadura'],
            ['nombre_comunidad' => 'Galicia'],
            ['nombre_comunidad' => 'La Rioja'],
            ['nombre_comunidad' => 'Madrid'],
            ['nombre_comunidad' => 'Melilla'],
            ['nombre_comunidad' => 'Murcia'],
            ['nombre_comunidad' => 'Navarra'],
            ['nombre_comunidad' => 'País Vasco']
        ];

        foreach ($comunidades as $comunidad) {
            ComunidadAutonoma::create($comunidad);
        }
    }
}
