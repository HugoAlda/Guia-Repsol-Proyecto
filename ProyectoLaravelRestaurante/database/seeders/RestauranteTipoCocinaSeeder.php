<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RestauranteTipoCocina;

class RestauranteTipoCocinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $restaurantes_tipos = [
            // Restaurante Arzak
            ["restaurante_id" => 1, "tipo_cocina_id" => 31], // Vasca
            ["restaurante_id" => 1, "tipo_cocina_id" => 4],  // Española

            // El Celler de Can Roca
            ["restaurante_id" => 2, "tipo_cocina_id" => 27], // Catalana
            ["restaurante_id" => 2, "tipo_cocina_id" => 9],  // Mediterránea

            // DiverXO
            ["restaurante_id" => 3, "tipo_cocina_id" => 23], // Fusión
            ["restaurante_id" => 3, "tipo_cocina_id" => 4],  // Española

            // Aponiente
            ["restaurante_id" => 4, "tipo_cocina_id" => 28], // Gallega
            ["restaurante_id" => 4, "tipo_cocina_id" => 4],  // Española

            // Azurmendi
            ["restaurante_id" => 5, "tipo_cocina_id" => 31], // Vasca
            ["restaurante_id" => 5, "tipo_cocina_id" => 4],  // Española

            // Quique Dacosta
            ["restaurante_id" => 6, "tipo_cocina_id" => 29], // Valenciana
            ["restaurante_id" => 6, "tipo_cocina_id" => 9],  // Mediterránea

            // Martín Berasategui
            ["restaurante_id" => 7, "tipo_cocina_id" => 31], // Vasca
            ["restaurante_id" => 7, "tipo_cocina_id" => 4],  // Española

            // Sant Pau
            ["restaurante_id" => 8, "tipo_cocina_id" => 27], // Catalana
            ["restaurante_id" => 8, "tipo_cocina_id" => 9],  // Mediterránea

            // Mugaritz
            ["restaurante_id" => 9, "tipo_cocina_id" => 31], // Vasca
            ["restaurante_id" => 9, "tipo_cocina_id" => 4],  // Española

            // Casa Marcial
            ["restaurante_id" => 10, "tipo_cocina_id" => 28], // Gallega
            ["restaurante_id" => 10, "tipo_cocina_id" => 4],  // Española

            // Cenador de Amós
            ["restaurante_id" => 11, "tipo_cocina_id" => 31], // Vasca
            ["restaurante_id" => 11, "tipo_cocina_id" => 4],  // Española

            // Akelarre
            ["restaurante_id" => 12, "tipo_cocina_id" => 31], // Vasca
            ["restaurante_id" => 12, "tipo_cocina_id" => 4],  // Española

            // Etxebarri
            ["restaurante_id" => 13, "tipo_cocina_id" => 31], // Vasca
            ["restaurante_id" => 13, "tipo_cocina_id" => 4],  // Española

            // Elkano
            ["restaurante_id" => 14, "tipo_cocina_id" => 28], // Gallega
            ["restaurante_id" => 14, "tipo_cocina_id" => 4],  // Española

            // Abac
            ["restaurante_id" => 15, "tipo_cocina_id" => 27], // Catalana
            ["restaurante_id" => 15, "tipo_cocina_id" => 9],  // Mediterránea

            // El Bohío
            ["restaurante_id" => 16, "tipo_cocina_id" => 29], // Valenciana
            ["restaurante_id" => 16, "tipo_cocina_id" => 4],  // Española

            // Coque
            ["restaurante_id" => 17, "tipo_cocina_id" => 31], // Vasca
            ["restaurante_id" => 17, "tipo_cocina_id" => 4],  // Española

            // El Portal de Echaurren
            ["restaurante_id" => 18, "tipo_cocina_id" => 32], // Castellana
            ["restaurante_id" => 18, "tipo_cocina_id" => 4],  // Española

            // El Invernadero
            ["restaurante_id" => 19, "tipo_cocina_id" => 23], // Fusión
            ["restaurante_id" => 19, "tipo_cocina_id" => 4],  // Española

            // El Poblet
            ["restaurante_id" => 20, "tipo_cocina_id" => 32], // Castellana
            ["restaurante_id" => 20, "tipo_cocina_id" => 4],  // Española

            // El Rincón de Juan Carlos
            ["restaurante_id" => 21, "tipo_cocina_id" => 29], // Valenciana
            ["restaurante_id" => 21, "tipo_cocina_id" => 4],  // Española

            // El Serbal
            ["restaurante_id" => 22, "tipo_cocina_id" => 31], // Vasca
            ["restaurante_id" => 22, "tipo_cocina_id" => 4],  // Española

            // Solana
            ["restaurante_id" => 23, "tipo_cocina_id" => 32], // Castellana
            ["restaurante_id" => 23, "tipo_cocina_id" => 4],  // Española

            // El Trigo
            ["restaurante_id" => 24, "tipo_cocina_id" => 32], // Castellana
            ["restaurante_id" => 24, "tipo_cocina_id" => 4],  // Española

            // El Txoko
            ["restaurante_id" => 25, "tipo_cocina_id" => 31], // Vasca
            ["restaurante_id" => 25, "tipo_cocina_id" => 4],  // Española

            // El Ventorrillo
            ["restaurante_id" => 26, "tipo_cocina_id" => 32], // Castellana
            ["restaurante_id" => 26, "tipo_cocina_id" => 4],  // Española

            // El Zaguán de Salamanca
            ["restaurante_id" => 27, "tipo_cocina_id" => 32], // Castellana
            ["restaurante_id" => 27, "tipo_cocina_id" => 4],  // Española

            // Eneko
            ["restaurante_id" => 28, "tipo_cocina_id" => 31], // Vasca
            ["restaurante_id" => 28, "tipo_cocina_id" => 4],  // Española

            // Es Fum
            ["restaurante_id" => 29, "tipo_cocina_id" => 27], // Catalana
            ["restaurante_id" => 29, "tipo_cocina_id" => 9],  // Mediterránea

            // Fonda Sala
            ["restaurante_id" => 30, "tipo_cocina_id" => 32], // Castellana
            ["restaurante_id" => 30, "tipo_cocina_id" => 4],  // Española

            // Gresca 
            ["restaurante_id" => 31, "tipo_cocina_id" => 27], // Catalana
            ["restaurante_id" => 31, "tipo_cocina_id" => 9],  // Mediterránea

            // Hofmann 
            ["restaurante_id" => 32, "tipo_cocina_id" => 27], // Catalana
            ["restaurante_id" => 32, "tipo_cocina_id" => 9],  // Mediterránea

            // Kaleja 
            ["restaurante_id" => 33, "tipo_cocina_id" => 27], // Catalana
            ["restaurante_id" => 33, "tipo_cocina_id" => 9],  // Mediterránea

            // Kiro Sushi 
            ["restaurante_id" => 34, "tipo_cocina_id" => 3],  // Japonesa

            // La Boscana
            ["restaurante_id" => 35, "tipo_cocina_id" => 32], // Castellana
            ["restaurante_id" => 35, "tipo_cocina_id" => 4],  // Española

            // La Cabaña
            ["restaurante_id" => 36, "tipo_cocina_id" => 32], // Castellana
            ["restaurante_id" => 36, "tipo_cocina_id" => 4],  // Española

            // La Finca
            ["restaurante_id" => 37, "tipo_cocina_id" => 32], // Castellana
            ["restaurante_id" => 37, "tipo_cocina_id" => 4],  // Española

            // La Salita
            ["restaurante_id" => 38, "tipo_cocina_id" => 29], // Valenciana
            ["restaurante_id" => 38, "tipo_cocina_id" => 4],  // Española

            // Lúa
            ["restaurante_id" => 39, "tipo_cocina_id" => 27], // Catalana
            ["restaurante_id" => 39, "tipo_cocina_id" => 9],  // Mediterránea

            // Maralba
            ["restaurante_id" => 40, "tipo_cocina_id" => 29], // Valenciana
            ["restaurante_id" => 40, "tipo_cocina_id" => 4],  // Española

            // Monastrell
            ["restaurante_id" => 41, "tipo_cocina_id" => 29], // Valenciana
            ["restaurante_id" => 41, "tipo_cocina_id" => 4],  // Española

            // Noor
            ["restaurante_id" => 42, "tipo_cocina_id" => 32], // Castellana
            ["restaurante_id" => 42, "tipo_cocina_id" => 4],  // Española

            // Orobianco
            ["restaurante_id" => 43, "tipo_cocina_id" => 1],  // Italiana

            // Pepe Vieira
            ["restaurante_id" => 44, "tipo_cocina_id" => 28], // Gallega
            ["restaurante_id" => 44, "tipo_cocina_id" => 4],  // Española

            // Ricard Camarena
            ["restaurante_id" => 45, "tipo_cocina_id" => 29], // Valenciana
            ["restaurante_id" => 45, "tipo_cocina_id" => 4],  // Española

            // Rodero
            ["restaurante_id" => 46, "tipo_cocina_id" => 32], // Castellana
            ["restaurante_id" => 46, "tipo_cocina_id" => 4],  // Española

            // Sollo
            ["restaurante_id" => 47, "tipo_cocina_id" => 28], // Gallega
            ["restaurante_id" => 47, "tipo_cocina_id" => 4],  // Española
            // Via Veneto
            ["restaurante_id" => 48, "tipo_cocina_id" => 27], // Catalana
            ["restaurante_id" => 48, "tipo_cocina_id" => 9],  // Mediterránea

            // Tatau
            ["restaurante_id" => 49, "tipo_cocina_id" => 12], // Coreana
            ["restaurante_id" => 49, "tipo_cocina_id" => 23], // Fusión

            // Trivio
            ["restaurante_id" => 50, "tipo_cocina_id" => 1],  // Italiana
            ["restaurante_id" => 50, "tipo_cocina_id" => 9],  // Mediterránea

            // Zaranda
            ["restaurante_id" => 51, "tipo_cocina_id" => 31], // Vasca
            ["restaurante_id" => 51, "tipo_cocina_id" => 4]  // Española
        ];

        foreach ($restaurantes_tipos as $restaurante_tipo) {
            RestauranteTipoCocina::create($restaurante_tipo);
        }
    }
}