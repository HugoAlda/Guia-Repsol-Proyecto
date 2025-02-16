<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Bienvenido Administrador</h1>
        <a href="" class="btn btn-primary mb-3">Crear Nuevo Restaurante</a>
        <div class="row">
            @foreach ($restaurantes as $restaurante)
                @if ($restaurantes->isNotEmpty())
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $restaurante->nombre_restaurante }}</h5>
                                <p class="card-text">{{ $restaurante->ubicacion_restaurante }}</p>
                                <p class="card-text">{{ $restaurante->descripcion_restaurante }}</p>
                                <a href="" class="btn btn-warning">Editar</a>
                                <form action="" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</body>
</html>