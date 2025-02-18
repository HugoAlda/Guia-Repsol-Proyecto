<?php

namespace App\Http\Controllers;

use App\Models\Restaurante;
use Illuminate\Http\Request;
use App\Models\ComunidadAutonoma;
use App\Models\Provincia;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index(Request $request)
{
    // Obtener los parámetros de filtrado
    $nombreRestaurante = $request->input('nombre_restaurante');
    $idComunidadAutonoma = $request->input('id_comunidad_autonoma');
    $idProvincia = $request->input('id_provincia');
    $valoraciones = $request->input('valoracion', []); // Obtener las valoraciones seleccionadas

    // Obtener todas las comunidades y provincias para los selects
    $comunidades = ComunidadAutonoma::all();
    $provincias = Provincia::all();

    // Construir la consulta de restaurantes
    $restaurantes = Restaurante::query();

    // Aplicar filtros si existen
    if ($nombreRestaurante) {
        $restaurantes->where('nombre_restaurante', 'like', '%' . $nombreRestaurante . '%');
    }

    if ($idComunidadAutonoma) {
        $restaurantes->where('id_comunidad_autonoma', $idComunidadAutonoma);
    }

    if ($idProvincia) {
        $restaurantes->where('id_provincia', $idProvincia);
    }

    // Filtrar por valoraciones si se seleccionan
    if (!empty($valoraciones)) {
        $restaurantes->whereIn('valoracion_media', $valoraciones);
    }

    // Obtener los resultados filtrados
    $restaurantes = $restaurantes->get();

    // Pasar los datos a la vista
    return view('admin', compact('restaurantes', 'comunidades', 'provincias'));
}
    public function create()
    {
        $comunidades = ComunidadAutonoma::all();
        $provincias = Provincia::all();

        return view('create', compact('comunidades', 'provincias'));
    }

    public function store(Request $request)
    {
        // Definir las reglas de validación
        $rules = [
            'nombre_restaurante' => 'required',
            'ubicacion_restaurante' => 'required',
            'img_restaurante' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'descripcion_restaurante' => 'nullable|string',
            'horario_restaurante' => 'nullable|string',
            'precio_restaurante' => 'nullable|numeric',
            'valoracion_media' => 'nullable|numeric|min:0|max:5',
            'nombre_gerente' => 'nullable|string',
            'email_gerente' => 'nullable|email',
            'id_comunidad_autonoma' => 'required|exists:comunidades_autonomas,id',
            'id_provincia' => 'required|exists:provincias,id',
        ];

        // Definir los mensajes personalizados de error
        $messages = [
            'nombre_restaurante.required' => 'El nombre del restaurante es obligatorio.',
            'ubicacion_restaurante.required' => 'La ubicación del restaurante es obligatoria.',
            'img_restaurante.image' => 'El archivo de imagen debe ser una imagen válida.',
            'descripcion_restaurante.string' => 'La descripción debe ser un texto válido.',
            'horario_restaurante.string' => 'El horario debe ser un texto válido.',
            'precio_restaurante.numeric' => 'El precio debe ser un número.',
            'valoracion_media.numeric' => 'La valoración media debe ser un número entre 0 y 5.',
            'valoracion_media.min' => 'La valoración media no puede ser menor a 0.',
            'valoracion_media.max' => 'La valoración media no puede ser mayor a 5.',
            'nombre_gerente.string' => 'El nombre del gerente debe ser un texto válido.',
            'email_gerente.email' => 'El email del gerente debe ser una dirección de correo válida.',
            'id_comunidad_autonoma.required' => 'La comunidad autónoma es obligatoria.',
            'id_comunidad_autonoma.exists' => 'La comunidad autónoma seleccionada no existe.',
            'id_provincia.required' => 'La provincia es obligatoria.',
            'id_provincia.exists' => 'La provincia seleccionada no existe.',
        ];

        // Validar la solicitud con las reglas y mensajes definidos
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Manejo de la imagen (si se carga)
        $imagePath = null;
        if ($request->hasFile('img_restaurante')) {
            $file = $request->file('img_restaurante');
            $filename = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('img/logos_restaurantes');
            $file->move($destinationPath, $filename);
            $imagePath = $filename;
        }

        // Crear el restaurante
        Restaurante::create([
            'nombre_restaurante' => $request->nombre_restaurante,
            'ubicacion_restaurante' => $request->ubicacion_restaurante,
            'descripcion_restaurante' => $request->descripcion_restaurante,
            'horario_restaurante' => $request->horario_restaurante,
            'precio_restaurante' => $request->precio_restaurante,
            'valoracion_media' => $request->valoracion_media,
            'nombre_gerente' => $request->nombre_gerente,
            'email_gerente' => $request->email_gerente,
            'id_comunidad_autonoma' => $request->id_comunidad_autonoma,
            'id_provincia' => $request->id_provincia,
            'img_restaurante' => $imagePath,
        ]);

        return redirect()->route('admin')
            ->with('success', 'Restaurante creado exitosamente.');
    }

    public function show(Restaurante $restaurante)
    {
        return view('restaurantes.show', compact('restaurante'));
    }

    public function edit(Restaurante $restaurante)
    {
        $comunidades = ComunidadAutonoma::all();
        $provincias = Provincia::all();

        return view('edit', compact('restaurante', 'comunidades', 'provincias'));
    }

    public function update(Request $request, Restaurante $restaurante)
    {
        // Definir las reglas de validación para la actualización
        $rules = [
            'nombre_restaurante' => 'required',
            'ubicacion_restaurante' => 'required',
            'img_restaurante' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'descripcion_restaurante' => 'nullable|string',
            'horario_restaurante' => 'nullable|string',
            'precio_restaurante' => 'nullable|numeric',
            'valoracion_media' => 'nullable|numeric|min:0|max:5',
            'nombre_gerente' => 'nullable|string',
            'email_gerente' => 'nullable|email',
            'id_comunidad_autonoma' => 'required|exists:comunidades_autonomas,id',
            'id_provincia' => 'required|exists:provincias,id',
        ];

        // Mensajes de error personalizados para la actualización
        $messages = [
            'nombre_restaurante.required' => 'El nombre del restaurante es obligatorio.',
            'ubicacion_restaurante.required' => 'La ubicación del restaurante es obligatoria.',
            'img_restaurante.image' => 'El archivo de imagen debe ser una imagen válida.',
            'descripcion_restaurante.string' => 'La descripción debe ser un texto válido.',
            'horario_restaurante.string' => 'El horario debe ser un texto válido.',
            'precio_restaurante.numeric' => 'El precio debe ser un número.',
            'valoracion_media.numeric' => 'La valoración media debe ser un número entre 0 y 5.',
            'valoracion_media.min' => 'La valoración media no puede ser menor a 0.',
            'valoracion_media.max' => 'La valoración media no puede ser mayor a 5.',
            'nombre_gerente.string' => 'El nombre del gerente debe ser un texto válido.',
            'email_gerente.email' => 'El email del gerente debe ser una dirección de correo válida.',
            'id_comunidad_autonoma.required' => 'La comunidad autónoma es obligatoria.',
            'id_comunidad_autonoma.exists' => 'La comunidad autónoma seleccionada no existe.',
            'id_provincia.required' => 'La provincia es obligatoria.',
            'id_provincia.exists' => 'La provincia seleccionada no existe.',
        ];

        // Validar la solicitud
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Manejo de la imagen (si se carga)
        if ($request->hasFile('img_restaurante')) {
            $file = $request->file('img_restaurante');
            $filename = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('img/logos_restaurantes');
            $file->move($destinationPath, $filename);
            $restaurante->img_restaurante = $filename;
        }

        // Actualizar restaurante
        $restaurante->update($request->except(['img_restaurante']) + ['img_restaurante' => $restaurante->img_restaurante]);

        return redirect()->route('admin')
            ->with('success', 'Restaurante actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $restaurante = Restaurante::findOrFail($id);
        $restaurante->delete();

        return redirect()->route('admin')->with('success', 'Restaurante eliminado correctamente.');
    }
}