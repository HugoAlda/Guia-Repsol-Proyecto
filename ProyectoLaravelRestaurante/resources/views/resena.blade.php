<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reseña Guachinche</title>
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
    <div class="amarillo">

    </div>
    <div class="resena-container">
        <div class="resena-izquierda">
            <h1 class="resena-nombre">Guachinche</h1>
            <div class="resena-valoracion">
                <span class="estrellas">⭐⭐⭐⭐☆</span>
            </div>
            <p class="resena-direccion">Calle Falsa 123, Tenerife</p>
            <iframe 
                class="resena-mapa"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.8354345093745!2d144.95373631531858!3d-37.8162797797517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzfCsDQ4JzU4LjYiUyAxNDTCsDU3JzEyLjQiRQ!5e0!3m2!1sen!2sus!4v1604410721678!5m2!1sen!2sus"
                frameborder="0"
                allowfullscreen=""
                aria-hidden="false"
                tabindex="0"></iframe>
            <p class="resena-descripcion">Este guachinche ofrece una experiencia gastronómica única con platos tradicionales y un ambiente acogedor.</p>
        </div>
        <div class="resena-derecha">
            <img src="{{ asset('img/guachinche.png') }}" alt="Imagen del Restaurante" class="resena-imagen">
            <div class="resena-info">
                <p><span>Horarios:</span> Buenas tardes</p>
                <p><span>Precio medio de la carta:</span> 25€</p>
                <p><span>Tipo de Cocina:</span> Canaria</p>
            </div>
        </div>
    </div>
</body>
</html>
