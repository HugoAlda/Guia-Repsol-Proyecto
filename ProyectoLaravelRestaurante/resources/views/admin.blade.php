<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar">
        <div class="containerLogo">
            <h3>Bienvenido @if (auth()->check())
                    <!-- Mostrar el nombre y correo del usuario -->
                    <div class="user-info">
                        <span>{{ auth()->user()->username }}</span>
                        <!-- Botón de Cerrar Sesión -->
                        <form action="{{ route('logout') }}" method="POST" class="logout-form">
                            @csrf
                            <button type="submit" class="btn-logout">Cerrar Sesión</button>
                        </form>
                    </div>
                @endif
            </h1>
        </div>
    </nav>
    <div class="container">
        <a href="{{ route('admin.create') }}" class="btn btn-primary mb-3">Crear Nuevo Restaurante</a>

        @if ($restaurantes->isNotEmpty())
            <table class="table table-striped ml-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Ubicación</th>
                        <th>Descripción</th>
                        <th>Horario</th>
                        <th>Precio</th>
                        <th>Valoración</th>
                        <th>Imagen</th>
                        <th>Gerente</th>
                        <th>Email</th>
                        <th>Comunidad Autónoma</th>
                        <th>Provincia</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($restaurantes as $restaurante)
                        <tr>
                            <td>{{ $restaurante->id }}</td>
                            <td>{{ $restaurante->nombre_restaurante }}</td>
                            <td>{{ $restaurante->ubicacion_restaurante }}</td>
                            <td>{{ $restaurante->descripcion_restaurante }}</td>
                            <td>{{ $restaurante->horario_restaurante ?? 'No disponible' }}</td>
                            <td>{{ $restaurante->precio_restaurante ? number_format($restaurante->precio_restaurante, 2) . '€' : 'No disponible' }}
                            </td>
                            <td>{{ number_format($restaurante->valoracion_media, 1) }}</td>
                            <td class="imagenes">
                                @if ($restaurante->img_restaurante)
                                    <img src="{{ asset('img/logos_restaurantes/' . $restaurante->img_restaurante) }}"
                                        alt="Imagen del restaurante" class="img-thumbnail" width="100">
                                @else
                                    No disponible
                                @endif
                            </td>
                            <td>{{ $restaurante->nombre_gerente ?? 'No disponible' }}</td>
                            <td>{{ $restaurante->email_gerente ?? 'No disponible' }}</td>
                            <td>{{ $restaurante->comunidadAutonoma->nombre_comunidad }}</td>
                            <td>{{ $restaurante->provincia->nombre_provincia }}</td>
                            <td class="botones">
                                <a href="{{ route('admin.edit', $restaurante->id) }}"
                                    class="btn btn-warning d-inline">Editar</a>

                                <form action="{{ route('admin.destroy', $restaurante->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger d-inline">Eliminar</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="alert alert-warning">No hay restaurantes registrados.</p>
        @endif
    </div>
</body>

</html>
