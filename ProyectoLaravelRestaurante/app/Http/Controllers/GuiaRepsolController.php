<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurante;

class GuiaRepsolController extends Controller
{
    public function index() {
        // Obtener todos los restaurantes ordenados por valoración de mayor a menor
        $restaurantes = Restaurante::orderByDesc('valoracion_media')->get();
    
        // Agrupar los restaurantes por valoración (número de estrellas)
        $restaurantesByRating = $restaurantes->groupBy('valoracion_media');
    
        // Pasar los datos a la vista
        return view('guia-repsol', compact('restaurantesByRating'));
    }
    

    public function login(){
        return view('login');
    }
}