<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurante;

class ResenaController extends Controller
{
    public function show($id)
    {
        // Obtener el restaurante por su id
        $restaurante = Restaurante::findOrFail($id);

        // Pasar la información del restaurante a la vista 'resena'
        return view('resena', compact('restaurante'));
    }
}
