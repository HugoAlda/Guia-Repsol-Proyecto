<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurante;

class RestauranteController extends Controller
{
    public function index(Request $request)
    {
        // Inicializar la consulta base
        $query = Restaurante::with(['comunidadAutonoma']);

        // Filtro por nombre
        if ($request->has('nombre') && $request->nombre) {
            $query->where('nombre_restaurante', 'like', '%' . $request->nombre . '%');
        }

        // Filtro por tipo de cocina
        if ($request->has('cocina') && is_array($request->cocina)) {
            $query->whereIn('tipo_cocina', $request->cocina);
        }

        // Filtro por valoraciones
        if ($request->has('valoracion') && is_array($request->valoracion)) {
            $query->where(function ($q) use ($request) {
                foreach ($request->valoracion as $valoracion) {
                    $q->orWhereRaw('FLOOR(valoracion_media) = ?', [$valoracion]);
                }
            });
        }

        // Filtro por comunidades autónomas
        if ($request->has('comunidad') && is_array($request->comunidad)) {
            $query->whereIn('id_comunidad_autonoma', $request->comunidad);
        }

        // Obtener los restaurantes filtrados
        $restaurantes = $query->orderByDesc('valoracion_media')->get();

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

        // Datos para los filtros
        $tiposCocina = ['Mediterránea', 'Asiática', 'Italiana', 'Española', 'Vegetariana'];
        $comunidadesAutonomas = \App\Models\ComunidadAutonoma::pluck('nombre_comunidad', 'id'); // Obtener comunidades desde la BD

        // Pasar datos a la vista
        return view('guia-repsol', compact('restaurantesAgrupados', 'tiposCocina', 'comunidadesAutonomas'));
    }
}