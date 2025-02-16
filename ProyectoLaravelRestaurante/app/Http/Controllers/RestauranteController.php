<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurante;

class RestauranteController extends Controller
{
    public function index()
    {
        $restaurantes = Restaurante::all();
        // Agrupar restaurantes por rangos de valoración
        $restaurantesByRating = [
            '1' => $restaurantes->filter(function ($restaurante) {
                return $restaurante->valoracion_media > 0 && $restaurante->valoracion_media <= 1;
            }),
            '2' => $restaurantes->filter(function ($restaurante) {
                return $restaurante->valoracion_media >= 2 && $restaurante->valoracion_media < 3;
            }),
            '3' => $restaurantes->filter(function ($restaurante) {
                return $restaurante->valoracion_media >= 3 && $restaurante->valoracion_media < 4;
            }),
            '4' => $restaurantes->filter(function ($restaurante) {
                return $restaurante->valoracion_media >= 4 && $restaurante->valoracion_media < 5;
            }),
            '5' => $restaurantes->filter(function ($restaurante) {
                return $restaurante->valoracion_media >= 5;
            }),
        ];

        return view('guia-repsol', compact('restaurantesByRating'));
    }
}