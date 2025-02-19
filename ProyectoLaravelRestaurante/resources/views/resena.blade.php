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
            <!-- Verificar si el usuario está autenticado -->
            @if (auth()->check())
                <!-- Mostrar el nombre y correo del usuario -->
                <div class="user-info">
                    <span>{{ auth()->user()->username }}</span>
                    <!-- Botón de Cerrar Sesión -->
                    <form action="{{ route('logout') }}" method="POST" class="logout-form">
                        @csrf
                        <button type="submit" class="btn-logout">Cerrar Sesión</button>
                    </form>
                </div>
            @else
                <!-- Mostrar el botón de acceso si no está autenticado -->
                <a class="btn-access" href="{{ route('login') }}">Acceso</a>
            @endif
        </div>
    </nav>
    <div class="resena-container">
        <div class="resena-izquierda">
            <!-- Nombre del restaurante -->
            <h1 class="resena-nombre">{{ $restaurante->nombre_restaurante }}</h1>
            <!-- Ubicacion -->
            <div class="resena-ubicacion">
                <p>{{ $restaurante->ubicacion_restaurante }}</p>
                <span class="estrellas">
                    @for ($i = 0; $i < $restaurante->valoracion_media; $i++)
                        ⭐
                    @endfor
                    @for ($i = $restaurante->valoracion_media; $i < 5; $i++)
                        ☆
                        @endfor
                    <h3>{{$restaurante->valoracion_media}}</h3>
                </span>
            </div>
            <br>
            <!-- Mapa de Google -->
            <iframe class="resena-mapa"
                    src="https://www.google.com/maps/embed?pb={{ $restaurante->ubicacion_restaurante }}"
                    frameborder="0"
                    allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>

        <div class="resena-derecha">
            <img src="{{ asset('img/logos_restaurantes/' . $restaurante->img_restaurante) }}"
                 alt="Imagen del Restaurante" class="resena-imagen">
            <div class="resena-info">
                <!-- Horarios -->
                <p><span>Horarios:</span> {{ $restaurante->horario_restaurante }}</p>
                <p><span>Precio medio de la carta:</span> {{ $restaurante->precio_restaurante }}€</p>

                <!-- Descripción del restaurante -->
                <p><span>Descripción del restaurante:</span> {{ $restaurante->descripcion_restaurante }}</p>


                <!-- Tipo Cocina -->
                
            </div>
        </div>
    </div>

    <!-- FORMULARIO PARA DEJAR UNA RESEÑA -->
    <div class="resena-form">
        <h2>Deja tu reseña</h2>
        <form id="form-valoracion" action="{{ route('resena.store') }}" method="POST">
            @csrf
            <input type="hidden" name="restaurant_id" value="{{ $restaurante->id }}">
            <input type="hidden" id="valoracion" name="valoracion" value="0">
            
            <div class="rating">
                @for ($i = 1; $i <= 5; $i++)
                    <span class="star" data-value="{{ $i }}">☆</span>
                @endfor
            </div>

            <textarea name="comentario" placeholder="Escribe tu reseña aquí..."></textarea>
            
            <button type="submit">Enviar valoración</button>    
        </form>
    </div>

    <!-- SECCIÓN DE RESEÑAS EXISTENTES -->
    @if ($restaurante->resenas && $restaurante->resenas->count() > 0)
        @foreach ($restaurante->resenas as $resena)
            <div class="resena">
                <p><strong>{{ $resena->user->name }}</strong> - {{ $resena->fecha_resena->format('d/m/Y') }}</p>
                <p>{{ $resena->comentario }}</p>
                <p>
                    @for ($i = 0; $i < round($resena->puntuacion); $i++)
                        ⭐
                    @endfor
                    @for ($i = round($resena->puntuacion); $i < 5; $i++)
                        ☆
                    @endfor
                    ({{ $resena->puntuacion }})
                </p>
            </div>
        @endforeach
    @else
        <p>No hay reseñas disponibles.</p>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const stars = document.querySelectorAll('.star');
            const ratingInput = document.getElementById('valoracion');

            stars.forEach(star => {
                star.addEventListener('click', function() {
                    const value = parseInt(this.dataset.value);
                    ratingInput.value = value;

                    stars.forEach(s => {
                        s.textContent = '☆';
                        s.classList.remove('selected');
                    });

                    for (let i = 0; i < value; i++) {
                        stars[i].textContent = '⭐';
                        stars[i].classList.add('selected');
                    }
                });
            });
        });
    </script>
</body>
</html>
