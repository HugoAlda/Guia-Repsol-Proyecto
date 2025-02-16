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
            <a class="btn-access" href="#">Acceso</a>
        </div>
    </nav>
    <div class="container">
        <h2 class="titulo">Descubre los galardonados con Estrellas Guía Repsol de 2024</h2>
        <div class="filters">
            <button class="filter-btn">5 Estrellas</button>
            <button class="filter-btn">4 Estrellas</button>
            <button class="filter-btn">3 Estrellas</button>
            <button class="filter-btn">2 Estrellas</button>
            <button class="filter-btn">1 Estrella</button>
        </div>
        
        <!-- Agrupar restaurantes por rangos de valoración -->
        @foreach ($restaurantesByRating as $range => $restaurantes)
            @if ($restaurantes->isNotEmpty())
                <div class="restaurant-category">
                    <div class="category-info">
                        <h3>{{ str_replace(',', '-', $range) }} Estrellas</h3>
                        <h5 class="comunidad">Andalucía</h5> <!-- Puedes hacer esto dinámico también -->
                    </div>
                    <div class="restaurant-cards-container">
                        @foreach ($restaurantes as $restaurante)
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
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</body>
</html>