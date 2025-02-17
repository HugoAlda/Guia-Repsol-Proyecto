<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurante;

class RestauranteController extends Controller
{
    public function index()
    {
        // Obtener todos los restaurantes con sus relaciones cargadas
        $restaurantes = Restaurante::with(['comunidadAutonoma'])
            ->orderByDesc('valoracion_media') // Ordenar por valoración descendente
            ->get();

        // Organizar los restaurantes por estrellas y comunidad autónoma
        $restaurantesAgrupados = $restaurantes->groupBy([
            function ($restaurante) {
                return floor($restaurante->valoracion_media); // Agrupa por estrellas (parte entera)
            },
            function ($restaurante) {
                return $restaurante->comunidadAutonoma?->nombre_comunidad; // Agrupa por comunidad autónoma
            }
        ]);

        // Ordenar comunidades autónomas alfabéticamente
        $restaurantesAgrupados = $restaurantesAgrupados->map(function ($comunidades, $range) {
            return $comunidades->sortKeys()->map(function ($restaurantes) {
                // Ordenar restaurantes alfabéticamente por nombre
                return $restaurantes->sortBy('nombre_restaurante');
            });
        });

        return view('guia-repsol', compact('restaurantesAgrupados'));
    }
}