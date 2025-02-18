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
        $tipos = [
            ["nombre_tipo" => 'Italiana'],
            ["nombre_tipo" => 'Mexicana'],
            ["nombre_tipo" => 'Japonesa'],
            ["nombre_tipo" => 'Española'],
            ["nombre_tipo" => 'Francesa'],
            ["nombre_tipo" => 'China'],
            ["nombre_tipo" => 'India'],
            ["nombre_tipo" => 'Tailandesa'],
            ["nombre_tipo" => 'Mediterránea'],
            ["nombre_tipo" => 'Griega'],
            ["nombre_tipo" => 'Peruana'],
            ["nombre_tipo" => 'Coreana'],
            ["nombre_tipo" => 'Argentina'],
            ["nombre_tipo" => 'Venezolana'],
            ["nombre_tipo" => 'Brasileña'],
            ["nombre_tipo" => 'Vietnamita'],
            ["nombre_tipo" => 'Marroquí'],
            ["nombre_tipo" => 'Turca'],
            ["nombre_tipo" => 'Cubana'],
            ["nombre_tipo" => 'Libanesa'],
            ["nombre_tipo" => 'Vegetariana'],
            ["nombre_tipo" => 'Vegana'],
            ["nombre_tipo" => 'Fusión'],
            ["nombre_tipo" => 'Asiática'],
            ["nombre_tipo" => 'Caribeña'],
            ["nombre_tipo" => 'Andaluza'],
            ["nombre_tipo" => 'Catalana'],
            ["nombre_tipo" => 'Gallega'],
            ["nombre_tipo" => 'Valenciana'],
            ["nombre_tipo" => 'Asturiana'],
            ["nombre_tipo" => 'Vasca'],
            ["nombre_tipo" => 'Castellana'],
            ["nombre_tipo" => 'Canaria'],
            ["nombre_tipo" => 'Murciana'],
            ["nombre_tipo" => 'Extremeña'],
            ["nombre_tipo" => 'Balear'],
            ["nombre_tipo" => 'Navarra'],
            ["nombre_tipo" => 'Aragonesa'],
            ["nombre_tipo" => 'Riojana']
        ];

        foreach ($tipos as $tipo) {
            TipoCocina::create($tipo);
        }
    }
}