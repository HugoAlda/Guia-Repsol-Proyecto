<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurante;

class GuiaRepsolController extends Controller
{
    public function index()
    {
        // Obtener todos los restaurantes de la base de datos
        $restaurants = Restaurante::all();

        // Pasar los restaurantes a la vista
        return view('guia-repsol', compact('restaurants'));
    }

    public function login(){
        return view('login');
    }
}