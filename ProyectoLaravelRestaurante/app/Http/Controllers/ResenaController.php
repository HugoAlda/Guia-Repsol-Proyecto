<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurante;
use App\Models\Resena;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;  // Para manipular fechas y horas en PHP

class ResenaController extends Controller
{
    public function show($id)
    {
        // Obtener el restaurante por su id
        $restaurante = Restaurante::findOrFail($id);
        
        // Convertir la fecha a un objeto Carbon
        foreach ($restaurante->resenas as $resena) {
            $resena->fecha_resena = Carbon::parse($resena->fecha_resena);
        }
        
        // Mostrar la vista con los datos del restaurante y las reseñas del mismo
        return view('resena', compact('restaurante'));
    }

    public function store(Request $request)
    {
        // Verificar si el usuario está autenticado
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para dejar una reseña.');
        }

        // Validar los datos del formulario
        $request->validate([
            'restaurant_id' => 'required|exists:restaurantes,id',
            'comentario' => 'required|string|max:1000',
            'valoracion' => 'required|numeric|min:1|max:5',
        ]);

        // Verificar si el usuario ya ha dejado una reseña para este restaurante
        $existingReview = Resena::where('id_users', Auth::id())
                                ->where('id_restaurantes', $request->restaurant_id)
                                ->first();

        if ($existingReview) {
            return back()->with('error', 'Ya has dejado una reseña para este restaurante.');
        }

        // Crear la reseña
        Resena::create([
            'id_users' => Auth::id(),  // Obtener el ID del usuario autenticado
            'id_restaurantes' => $request->restaurant_id,
            'comentario' => $request->comentario,
            'puntuacion' => $request->valoracion,
            'fecha_resena' => now(),
        ]);

        return back()->with('success', '¡Reseña guardada correctamente!');
    }
}
