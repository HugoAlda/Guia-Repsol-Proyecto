<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Nuevo Restaurante</title>
    <!-- Agregar el enlace a Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Crear Nuevo Restaurante</h1>
    
        <!-- Mostrar mensaje de éxito si existe -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    
        <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
            @csrf
    
            <div class="form-group">
                <label for="nombre_restaurante">Nombre del Restaurante</label>
                <input type="text" class="form-control @error('nombre_restaurante') is-invalid @enderror" id="nombre_restaurante" name="nombre_restaurante" value="{{ old('nombre_restaurante') }}" required>
                @error('nombre_restaurante')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="form-group">
                <label for="ubicacion_restaurante">Ubicación</label>
                <input type="text" class="form-control @error('ubicacion_restaurante') is-invalid @enderror" id="ubicacion_restaurante" name="ubicacion_restaurante" value="{{ old('ubicacion_restaurante') }}" required>
                @error('ubicacion_restaurante')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="form-group">
                <label for="descripcion_restaurante">Descripción</label>
                <textarea class="form-control @error('descripcion_restaurante') is-invalid @enderror" id="descripcion_restaurante" name="descripcion_restaurante" rows="4">{{ old('descripcion_restaurante') }}</textarea>
                @error('descripcion_restaurante')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="form-group">
                <label for="horario_restaurante">Horario</label>
                <input type="text" class="form-control @error('horario_restaurante') is-invalid @enderror" id="horario_restaurante" name="horario_restaurante" value="{{ old('horario_restaurante') }}">
                @error('horario_restaurante')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="form-group">
                <label for="precio_restaurante">Precio Promedio</label>
                <input type="number" class="form-control @error('precio_restaurante') is-invalid @enderror" id="precio_restaurante" name="precio_restaurante" step="0.01" value="{{ old('precio_restaurante') }}">
                @error('precio_restaurante')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="form-group">
                <label for="valoracion_media">Valoración Media</label>
                <input type="number" class="form-control @error('valoracion_media') is-invalid @enderror" id="valoracion_media" name="valoracion_media" step="0.01" min="0" max="5" value="{{ old('valoracion_media') }}">
                @error('valoracion_media')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="form-group">
                <label for="img_restaurante">Imagen del Restaurante</label>
                <input type="file" class="form-control @error('img_restaurante') is-invalid @enderror" id="img_restaurante" name="img_restaurante">
                @error('img_restaurante')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="form-group">
                <label for="nombre_gerente">Nombre del Gerente</label>
                <input type="text" class="form-control @error('nombre_gerente') is-invalid @enderror" id="nombre_gerente" name="nombre_gerente" value="{{ old('nombre_gerente') }}">
                @error('nombre_gerente')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="form-group">
                <label for="email_gerente">Email del Gerente</label>
                <input type="email" class="form-control @error('email_gerente') is-invalid @enderror" id="email_gerente" name="email_gerente" value="{{ old('email_gerente') }}">
                @error('email_gerente')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="form-group">
                <label for="id_comunidad_autonoma">Comunidad Autónoma</label>
                <select class="form-control @error('id_comunidad_autonoma') is-invalid @enderror" id="id_comunidad_autonoma" name="id_comunidad_autonoma" required>
                    <option value="">Seleccione una comunidad autónoma</option>
                    @foreach($comunidades as $comunidad)
                        <option value="{{ $comunidad->id }}" {{ old('id_comunidad_autonoma') == $comunidad->id ? 'selected' : '' }}>{{ $comunidad->nombre_comunidad }}</option>
                    @endforeach
                </select>
                @error('id_comunidad_autonoma')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="form-group">
                <label for="id_provincia">Provincia</label>
                <select class="form-control @error('id_provincia') is-invalid @enderror" id="id_provincia" name="id_provincia" required>
                    <option value="">Seleccione una provincia</option>
                    @foreach($provincias as $provincia)
                        <option value="{{ $provincia->id }}" {{ old('id_provincia') == $provincia->id ? 'selected' : '' }}>{{ $provincia->nombre_provincia }}</option>
                    @endforeach
                </select>
                @error('id_provincia')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
    
            <button type="submit" class="btn btn-success">Crear Restaurante</button>
            <a href="{{ route('index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <!-- Agregar el enlace a Bootstrap JS y sus dependencias -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
