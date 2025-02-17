<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $restaurante->nombre_restaurante }}</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>{{ $restaurante->nombre_restaurante }}</h1>
        <p><strong>Ubicación:</strong> {{ $restaurante->ubicacion_restaurante }}</p>
        <p><strong>Descripción:</strong> {{ $restaurante->descripcion_restaurante }}</p>
    </div>
</body>
</html>