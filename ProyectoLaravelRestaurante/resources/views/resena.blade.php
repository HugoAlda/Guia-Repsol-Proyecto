<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Guachinche</title>
    <link rel="stylesheet" href="{{ asset('css/resena.css') }}">
</head>
<body>
    <div class="container">
        <!-- Encabezado -->
        <div class="header">
            <img src="{{ asset('img/logoGuiaRepsol.png') }}" alt="Guía Repsol">
        </div>

        <!-- Nombre del restaurante -->
        <div class="restaurant-name">
            <img src="{{ asset('img/icon.png') }}" alt="Icono">
            <span>El Guachinche</span>
        </div>

        <!-- Valoración -->
        <div class="rating">
            ★★★☆☆
        </div>

        <!-- Información del restaurante -->
        <div class="restaurant-info">
            <img src="{{ asset('img/guachinche.png') }}" alt="Imagen del Restaurante">
        <!--    <img src="{{ asset('img/logos_restaurantes/' . $restaurante->img_restaurante) }}" alt="Imagen del Restaurante"> -->
            <div class="info-details">
                <ul>
                    <li><strong>Horarios:</strong> todos los días: 8:00 - 23:00</li><!-- {{ $restaurante->horario_restaurante }} -->
                    <li><strong>Precio medio de la carta:</strong> 28,30€</li><!-- {{ $restaurante->precio_restaurante }} -->
                    <li><strong>Tipo de Cocina:</strong> Canaria</li>
                </ul>
            </div>
        </div>

        <!-- Sección de valoración -->
        <div class="review-section">
            <h2>Danos tu valoración!</h2>
            <p>Aguaviva ha sido uno de los restaurantes que ha ayudado a configurar la oferta gastronómica de la isla...</p>
        </div>

        <!-- Botón explorar -->
        <a href="#" class="explore-button">Explorar sitios cerca</a>
    </div>
</body>
</html>
