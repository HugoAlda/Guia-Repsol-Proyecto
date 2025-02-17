<?php
namespace App\Http\Controllers;

use App\Models\Restaurante;
use App\Models\ComunidadAutonoma;
use App\Models\Provincia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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

    public function create()
    {
        // Obtener comunidades autónomas y provincias usando Eloquent
        $comunidades = ComunidadAutonoma::all();
        $provincias = Provincia::all();

        return view('create', compact('comunidades', 'provincias'));
    }

    public function store(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'nombre_restaurante' => 'required|string|max:255',
            'ubicacion_restaurante' => 'required|string|max:255',
            'descripcion_restaurante' => 'required|string',
            'horario_restaurante' => 'nullable|string',
            'precio_restaurante' => 'nullable|numeric',
            'valoracion_media' => 'nullable|numeric|min:0|max:5',
            'img_restaurante' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nombre_gerente' => 'nullable|string|max:255',
            'email_gerente' => 'nullable|email|max:255',
            'id_comunidad_autonoma' => 'required|exists:comunidad_autonoma,id',
            'id_provincia' => 'required|exists:provincia,id',
        ]);

        // Subir la imagen si se proporciona
        if ($request->hasFile('img_restaurante')) {
            // Obtener el archivo
            $imagen = $request->file('img_restaurante');

            // Generar un nombre único para la imagen
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();

            // Mover la imagen a la carpeta public/img/logos_restaurantes
            $imagen->move(public_path('img/logos_restaurantes'), $nombreImagen);

            // Guardar solo el nombre de la imagen en la base de datos
            $imagenNombre = $nombreImagen;
        } else {
            $imagenNombre = null; // Si no se sube una imagen, podemos asignar null
        }

        // Crear el restaurante en la base de datos
        $restaurante = new Restaurante();
        $restaurante->nombre_restaurante = $request->input('nombre_restaurante');
        $restaurante->ubicacion_restaurante = $request->input('ubicacion_restaurante');
        $restaurante->descripcion_restaurante = $request->input('descripcion_restaurante');
        $restaurante->horario_restaurante = $request->input('horario_restaurante');
        $restaurante->precio_restaurante = $request->input('precio_restaurante');
        $restaurante->valoracion_media = $request->input('valoracion_media');
        $restaurante->img_restaurante = $imagenNombre; // Guardar solo el nombre de la imagen
        $restaurante->nombre_gerente = $request->input('nombre_gerente');
        $restaurante->email_gerente = $request->input('email_gerente');
        $restaurante->id_comunidad_autonoma = $request->input('id_comunidad_autonoma');
        $restaurante->id_provincia = $request->input('id_provincia');
        
        // Guardar el restaurante
        $restaurante->save();

        // Redirigir a la página de administración con un mensaje de éxito
        return Redirect::route('admin')->with('success', 'Restaurante creado exitosamente.');
    }
}