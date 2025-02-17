<?php

namespace Database\Seeders;
use App\Models\Provincia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvinciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $provincias = [
            ['nombre_provincia' => 'Álava'],
            ['nombre_provincia' => 'Albacete'],
            ['nombre_provincia' => 'Alicante'],
            ['nombre_provincia' => 'Almería'],
            ['nombre_provincia' => 'Asturias'],
            ['nombre_provincia' => 'Ávila'],
            ['nombre_provincia' => 'Badajoz'],
            ['nombre_provincia' => 'Balears'],
            ['nombre_provincia' => 'Barcelona'],
            ['nombre_provincia' => 'Burgos'],
            ['nombre_provincia' => 'Cáceres'],
            ['nombre_provincia' => 'Cádiz'],
            ['nombre_provincia' => 'Cantabria'],
            ['nombre_provincia' => 'Castellón'],
            ['nombre_provincia' => 'Ceuta'],
            ['nombre_provincia' => 'Ciudad Real'],
            ['nombre_provincia' => 'Córdoba'],
            ['nombre_provincia' => 'Coruña'],
            ['nombre_provincia' => 'Cuenca'],
            ['nombre_provincia' => 'Girona'],
            ['nombre_provincia' => 'Granada'],
            ['nombre_provincia' => 'Guadalajara'],
            ['nombre_provincia' => 'Gipuzkoa'],
            ['nombre_provincia' => 'Huelva'],
            ['nombre_provincia' => 'Huesca'],
            ['nombre_provincia' => 'Jaén'],
            ['nombre_provincia' => 'León'],
            ['nombre_provincia' => 'Lugo'],
            ['nombre_provincia' => 'Lleida'],
            ['nombre_provincia' => 'Madrid'],
            ['nombre_provincia' => 'Málaga'],
            ['nombre_provincia' => 'Melilla'],
            ['nombre_provincia' => 'Murcia'],
            ['nombre_provincia' => 'Navarra'],
            ['nombre_provincia' => 'Ourense'],
            ['nombre_provincia' => 'Palencia'],
            ['nombre_provincia' => 'Palmas'],
            ['nombre_provincia' => 'Pontevedra'],
            ['nombre_provincia' => 'La Rioja'],
            ['nombre_provincia' => 'Salamanca'],
            ['nombre_provincia' => 'Santa Cruz de Tenerife'],
            ['nombre_provincia' => 'Segovia'],
            ['nombre_provincia' => 'Sevilla'],
            ['nombre_provincia' => 'Soria'],
            ['nombre_provincia' => 'Tarragona'],
            ['nombre_provincia' => 'Teruel'],
            ['nombre_provincia' => 'Toledo'],
            ['nombre_provincia' => 'Valencia'],
            ['nombre_provincia' => 'Valladolid'],
            ['nombre_provincia' => 'Vizcaya'],
            ['nombre_provincia' => 'Zamora'],
            ['nombre_provincia' => 'Zaragoza']
        ];

        foreach ($provincias as $provincia) {
            Provincia::create($provincia);
        }
    }
}
