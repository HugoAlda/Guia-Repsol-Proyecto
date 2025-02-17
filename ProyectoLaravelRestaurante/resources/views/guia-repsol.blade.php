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
        
        <!-- Mostrar restaurantes agrupados por comunidad, provincia y estrellas -->
        @foreach ($restaurantesAgrupados as $comunidad => $provincias)
            <div class="community-section">
                <h3 class="community-title">{{ $comunidad }}</h3>

                @foreach ($provincias as $provincia => $estrellas)
                    <div class="province-section">
                        <h4 class="province-title">{{ $provincia }}</h4>

                        @foreach ($estrellas as $range => $restaurantes)
                            @if ($restaurantes->isNotEmpty())
                                <div class="restaurant-category">
                                    <div class="category-info">
                                        <h5>⭐ {{ $range }} Estrellas</h5>
                                    </div>
                                    <div class="restaurant-cards-container">
                                        @foreach ($restaurantes->sortByDesc('valoracion_media') as $restaurante)
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
                @endforeach
            </div>
        @endforeach
    </div>
</body>
</html>