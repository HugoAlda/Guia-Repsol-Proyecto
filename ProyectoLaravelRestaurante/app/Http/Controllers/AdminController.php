<?php

namespace App\Http\Controllers;

use App\Models\Restaurante;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $restaurantes = Restaurante::all();
        return view('admin', compact('restaurantes'));
    }

    public function create()
    {
        return view('restaurantes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_restaurante' => 'required',
            'ubicacion_restaurante' => 'required',
            // Agrega más validaciones según sea necesario
        ]);

        Restaurante::create($request->all());

        return redirect()->route('restaurantes.index')
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
            // Agrega más validaciones según sea necesario
        ]);

        $restaurante->update($request->all());

        return redirect()->route('restaurantes.index')
                         ->with('success', 'Restaurante actualizado exitosamente.');
    }

    public function destroy(Restaurante $restaurante)
    {
        $restaurante->delete();

        return redirect()->route('restaurantes.index')
                         ->with('success', 'Restaurante eliminado exitosamente.');
    }

}