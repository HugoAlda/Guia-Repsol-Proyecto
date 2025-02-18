<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurante;
use App\Models\Resena;
use Illuminate\Support\Facades\Auth;

class ResenaController extends Controller
{
    public function show($id)
    {
        // Obtener el restaurante por su id
        $restaurante = Restaurante::findOrFail($id);
        return view('resena', compact('restaurante'));
    }

    public function valorar(Request $request)
    {
        // Verificar que el usuario esté autenticado
        if (!Auth::check()) {
            return response()->json(['success' => false, 'redirect' => route('login')]);
        }

        $user_id = Auth::id();
        $restaurant_id = $request->restaurant_id;

        // Buscar reseña existente para este usuario y restaurante
        $resena = Resena::where('id_users', $user_id)
                        ->where('id_restaurantes', $restaurant_id)
                        ->first();

        if ($resena) {
            // Actualizar la reseña existente
            $resena->puntuacion = $request->valoracion;
            $resena->save();
        } else {
            // Crear una nueva reseña
            Resena::create([
                'id_users' => $user_id,
                'id_restaurantes' => $restaurant_id,
                'puntuacion' => $request->valoracion,
                'comentario' => '', // Puedes agregar lógica para comentarios si lo requieres
            ]);
        }

        // Actualizar la valoración media del restaurante
        $media = Resena::where('id_restaurantes', $restaurant_id)->avg('puntuacion');
        $restaurante = Restaurante::find($restaurant_id);
        $restaurante->valoracion_media = $media;
        $restaurante->save();

        return redirect()->back()->with('success', 'Valoración guardada correctamente.');
    }
}
