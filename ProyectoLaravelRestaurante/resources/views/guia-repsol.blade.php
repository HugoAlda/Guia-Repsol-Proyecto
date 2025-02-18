<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guía Repsol 2024</title>
    <link rel="stylesheet" href="{{ asset('css/guiaRepsol.css') }}">
</head>
<body>
    <nav class="navbar">
        <div class="containerLogo">
            <img src="{{ asset('img/logoGuiaRepsol.png') }}" alt="Logo Guía Repsol">
            <a class="btn-access" href="{{route('login')}}">Acceso</a>
        </div>
    </nav>

    <!-- Barra de Filtros -->
    <div class="filter-bar">
        <form action="{{ route('guia-repsol') }}" method="GET" class="filter-form">
            <!-- Filtro por nombre -->
            <div class="filter-group">
                <label for="nombre">Buscar por nombre:</label>
                <input type="text" id="nombre" name="nombre" value="{{ request('nombre') }}" placeholder="Ej: Restaurante...">
            </div>

            <!-- Filtro por tipo de cocina -->
            <div class="filter-group">
                <label>Tipo de cocina:</label>
                {{-- @foreach ($tiposCocina as $tipo)
                    <label>
                        <input type="checkbox" name="cocina[]" value="{{ $tipo }}" 
                            {{ in_array($tipo, request('cocina', [])) ? 'checked' : '' }}>
                        {{ $tipo }}
                    </label>
                @endforeach --}}
            </div>

            <!-- Filtro por valoraciones -->
            <div class="filter-group">
                <label>Valoraciones:</label>
                @for ($i = 1; $i <= 5; $i++)
                    <label>
                        <input type="checkbox" name="valoracion[]" value="{{ $i }}" 
                            {{ in_array($i, request('valoracion', [])) ? 'checked' : '' }}>
                        {{ str_repeat('⭐', $i) }}
                    </label>
                @endfor
            </div>

            <!-- Filtro por comunidades autónomas -->
            <div class="filter-group">
                <label>Comunidades Autónomas:</label>
                <select name="comunidad[]" id="comunidad" multiple>
                    @foreach ($comunidadesAutonomas as $id => $nombre)
                        <option value="{{ $id }}" 
                            {{ in_array($id, request('comunidad', [])) ? 'selected' : '' }}>
                            {{ $nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Botón de búsqueda -->
            <button type="submit" class="btn-filter">Filtrar</button>
        </form>
    </div>

    <!-- Contenido Principal -->
    <div class="container">
        <h2 class="titulo">Descubre los galardonados con Estrellas Guía Repsol de 2024</h2>

        <!-- Mostrar restaurantes agrupados por estrellas y comunidad -->
        @foreach ($restaurantesAgrupados as $range => $comunidades)
            <div class="rating-section">
                <h3 class="rating-title">⭐ {{ $range }} Estrellas</h3>
                @foreach ($comunidades as $comunidad => $restaurantes)
                    <div class="community-section">
                        <h4 class="community-title">{{ $comunidad }}</h4>
                        <div class="restaurant-cards-container">
                            @foreach ($restaurantes as $restaurante)
                                <a href="{{ route('resena', ['id' => $restaurante->id]) }}" class="restaurant-link">
                                    <div class="restaurant-card">
                                        <img src="{{ asset('img/logos_restaurantes/' . $restaurante->img_restaurante) }}" alt="{{ $restaurante->nombre_restaurante }}">
                                        <div class="info">
                                            <h5>{{ $restaurante->nombre_restaurante }}</h5>
                                            <p>{{ $restaurante->ubicacion_restaurante }}</p>
                                            <br>
                                            <h5>{{ $restaurante->precio_restaurante }}€</h5>
                                            <h3>{{ str_repeat('⭐', $restaurante->valoracion_media) }}</h3>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</body>
</html>