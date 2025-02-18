<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $restaurante->nombre_restaurante }}</title>
    <link rel="stylesheet" href="{{ asset('css/resena.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar">
        <div class="containerLogo">
            <img src="{{ asset('img/logoGuiaRepsol.png') }}" alt="Logo Guía Repsol">
            <a class="btn-access" href="#">Acceso</a>
        </div>
    </nav>
    <div class="amarillo"></div>
    <div class="resena-container">
        <div class="resena-izquierda">
            <!-- Nombre del restaurante -->
            <h1 class="resena-nombre">{{ $restaurante->nombre_restaurante }}</h1>

            <!-- Valoración actual -->
            <div class="resena-valoracion">
                <span class="estrellas">
                    @for ($i = 0; $i < round($restaurante->valoracion_media); $i++)
                        ⭐
                    @endfor
                    @for ($i = round($restaurante->valoracion_media); $i < 5; $i++)
                        ☆
                    @endfor
                </span>
            </div>

            <!-- Dirección -->
            <p class="resena-direccion">{{ $restaurante->direccion_restaurante }}</p>

            <!-- Mapa de Google -->
            <iframe class="resena-mapa"
                    src="https://www.google.com/maps/embed?pb={{ $restaurante->ubicacion_restaurante }}"
                    frameborder="0"
                    allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
        <div class="resena-derecha">
            <!-- Imagen del restaurante -->
            <img src="{{ asset('img/logos_restaurantes/' . $restaurante->img_restaurante) }}"
                 alt="Imagen del Restaurante" class="resena-imagen">

            <div class="resena-info">
                <!-- Horarios -->
                <p><span>Horarios:</span> {{ $restaurante->horario_restaurante }}</p>

                <!-- Precio medio -->
                <p><span>Precio medio de la carta:</span> {{ $restaurante->precio_restaurante }}€</p>

                <!-- Descripción del restaurante -->
                <p><span>Descripción del restaurante:</span> {{ $restaurante->descripcion_restaurante }}</p>
            </div>
        </div>
    </div>

    <!-- Sección de valoración de estrellas -->
    <form id="form-valoracion" action="{{ route('resena.valorar') }}" method="POST">
        @csrf
        <input type="hidden" name="restaurant_id" value="{{ $restaurante->id }}">
        <input type="hidden" id="valoracion" name="valoracion" value="0">
        <div class="rating">
            @for ($i = 1; $i <= 5; $i++)
                <span class="estrella" data-value="{{ $i }}">☆</span>
            @endfor
        </div>
        <button type="submit">Enviar valoración</button>
    </form>

    <script src="{{ asset('js/valoracion.js') }}"></script>
</body>
</html>
