<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurante;

class RestauranteController extends Controller
{
    public function index()
    {
        // Obtener restaurantes ordenados de mayor a menor valoración
        $restaurantes = Restaurante::orderByDesc('valoracion_media')->get();

        // Agrupar por la parte entera de la valoración media
        $restaurantesByRating = $restaurantes->groupBy(function ($restaurante) {
            return floor($restaurante->valoracion_media); // Agrupa en valores enteros (5, 4, 3, etc.)
        });

        return view('guia-repsol', compact('restaurantesByRating'));
    }
}
