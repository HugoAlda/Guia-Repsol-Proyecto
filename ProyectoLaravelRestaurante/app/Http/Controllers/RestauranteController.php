<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurante;

class RestauranteController extends Controller
{
    public function index()
    {
        // Obtener todos los restaurantes con sus relaciones cargadas
        $restaurantes = Restaurante::with(['comunidadAutonoma', 'provincia'])
            ->orderByDesc('valoracion_media')
            ->get();

        // Organizar los restaurantes por comunidad autónoma, provincia y estrellas
        $restaurantesAgrupados = $restaurantes->groupBy([
            function ($restaurante) {
                return $restaurante->comunidadAutonoma->nombre_comunidad; // Agrupa por comunidad autónoma
            },
            function ($restaurante) {
                return $restaurante->provincia->nombre_provincia; // Agrupa por provincia
            },
            function ($restaurante) {
                return floor($restaurante->valoracion_media); // Agrupa por estrellas (parte entera)
            }
        ]);

        return view('guia-repsol', compact('restaurantesAgrupados'));
    }
}