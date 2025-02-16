@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nuevo Restaurante</h1>
    <form action="{{ route('restaurantes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre_restaurante">Nombre</label>
            <input type="text" name="nombre_restaurante" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="ubicacion_restaurante">Ubicación</label>
            <input type="text" name="ubicacion_restaurante" class="form-control" required>
        </div>
        <!-- Agrega más campos según sea necesario -->
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
</div>
@endsection