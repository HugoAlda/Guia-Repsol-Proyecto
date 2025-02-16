@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Restaurante</h1>
    <form action="{{ route('restaurantes.update', $restaurante->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre_restaurante">Nombre</label>
            <input type="text" name="nombre_restaurante" class="form-control" value="{{ $restaurante->nombre_restaurante }}" required>
        </div>
        <div class="form-group">
            <label for="ubicacion_restaurante">Ubicación</label>
            <input type="text" name="ubicacion_restaurante" class="form-control" value="{{ $restaurante->ubicacion_restaurante }}" required>
        </div>
        <!-- Agrega más campos según sea necesario -->
        <button type="submit" class="btn btn-warning">Actualizar</button>
    </form>
</div>
@endsection