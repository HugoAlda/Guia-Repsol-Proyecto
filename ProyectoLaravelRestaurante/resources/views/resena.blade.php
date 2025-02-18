<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $restaurante->nombre_restaurante }}</title>
    <link rel="stylesheet" href="{{ asset('css/resena.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>

<body>
    <nav class="navbar">
        <div class="containerLogo">
            <img src="{{ asset('img/logoGuiaRepsol.png') }}" alt="Logo Guía Repsol">
            <a class="btn-access" href="{{route('login')}}">Acceso</a>
        </div>
    </nav>
    <div class="resena-container">
        <div class="resena-izquierda">
            <div class="resena-ubicacion">
                <h1 class="resena-nombre">{{ $restaurante->nombre_restaurante }}</h1>
                <p><span>Nombre gerente:</span> {{ $restaurante->nombre_gerente }}</p>
                <p>Ubicación: {{ $restaurante->ubicacion_restaurante }}</p>
                <span class="estrellas">
                    @php
                        $valoracion_entera = floor($restaurante->valoracion_media); // Parte entera de la valoración
                        $valoracion_fraccionaria = $restaurante->valoracion_media - $valoracion_entera; // Parte fraccionaria
                    @endphp
                                    
                    <!-- Estrellas llenas -->
                    @for ($i = 0; $i < $valoracion_entera; $i++)
                        <i class="fa-solid fa-star"></i>
                    @endfor
                                    
                    <!-- Estrella parcial -->
                    @if ($valoracion_fraccionaria > 0)
                        <i class="fa-solid fa-star-half-stroke"></i>
                    @endif
                                    
                    <!-- Estrellas vacías -->
                    @for ($i = ceil($restaurante->valoracion_media); $i < 5; $i++)
                        <i class="fa-regular fa-star"></i>
                    @endfor
                </span>
            </div>
            <br>
            <!-- Mapa de Google -->
            <iframe class="resena-mapa"
                src="https://www.google.com/maps/embed?pb={{ $restaurante->ubicacion_restaurante }}" frameborder="0"
                allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>

        <div class="resena-derecha">
            <!-- Imagen del restaurante -->
            <img src="{{ asset('img/logos_restaurantes/' . $restaurante->img_restaurante) }}"
                alt="Imagen del Restaurante" class="resena-imagen">

            <div class="resena-info">
                <!-- Gerente -->

                <!-- Horarios -->
                <p><span>Horarios:</span> {{ $restaurante->horario_restaurante }}</p>

                <!-- Precio medio -->
                <p><span>Precio medio de la carta:</span> {{ $restaurante->precio_restaurante }}€</p>


                <!-- Descripción del restaurante -->
                <p><span>Descripción del restaurante:</span> {{ $restaurante->descripcion_restaurante }}</p>


                <!-- Tipo Cocina -->
                
            </div>
        </div>
    </div>
</body>

</html>
