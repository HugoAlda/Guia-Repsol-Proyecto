<?php

namespace App\Http\Controllers;

use App\Models\Restaurante;
use Illuminate\Http\Request;
use App\Models\ComunidadAutonoma;
use App\Models\Provincia;

class AdminController extends Controller
{
    public function index()
    {
        $restaurantes = Restaurante::all();
        return view('admin', compact('restaurantes'));
    }

    public function create()
    {
        $comunidades = ComunidadAutonoma::all();
        $provincias = Provincia::all();

        return view('create', compact('comunidades', 'provincias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_restaurante' => 'required',
            'ubicacion_restaurante' => 'required',
            'img_restaurante' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('img_restaurante')) {
            $file = $request->file('img_restaurante');
            $filename = time() . '_' . $file->getClientOriginalName(); // Nombre único
            $destinationPath = public_path('img/logos_restaurantes'); // Carpeta en public/
        
            // Mover la imagen a la carpeta public/img/logos_restaurantes
            $file->move($destinationPath, $filename);
        
            // Guardar la ruta relativa en la base de datos
            $imagePath = $filename;
        }
        

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
        return view('restaurantes.edit', compact('restaurante'));
    }

    public function update(Request $request, Restaurante $restaurante)
    {
        $request->validate([
            'nombre_restaurante' => 'required',
            'ubicacion_restaurante' => 'required',
            'img_restaurante' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('img_restaurante')) {
            $imagePath = $request->file('img_restaurante')->store('restaurantes', 'public');
            $restaurante->img_restaurante = $imagePath;
        }

        $restaurante->update($request->except(['img_restaurante']) + ['img_restaurante' => $restaurante->img_restaurante]);

        return redirect()->route('admin')
            ->with('success', 'Restaurante actualizado exitosamente.');
    }

    public function destroy(Restaurante $restaurante)
    {
        $restaurante->delete();

        return redirect()->route('admin')
            ->with('success', 'Restaurante eliminado exitosamente.');
    }
}
