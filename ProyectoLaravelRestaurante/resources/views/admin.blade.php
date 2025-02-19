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
                    <span>{{ auth()->user()->username }}</span>
                    <form action="{{ route('logout') }}" method="POST" class="logout-form">
                        @csrf
                        <button type="submit" class="btn-logout">Cerrar Sesión</button>
                    </form>
                @endif
            </h3>
        </div>
    </nav>

    <!-- Formulario de filtros -->
    <div class="container">
        <form action="{{ route('admin.index') }}" method="GET" class="mb-3">
            <div class="form-row">
                <div class="col-md-3">
                    <input type="text" name="nombre_restaurante" class="form-control"
                        placeholder="Filtrar por nombre restaurante" value="{{ request()->input('nombre_restaurante') }}">
                </div>
                <div class="col-md-3 valoracion-filter">
                    <label>Valoraciones:</label>
                    @for ($i = 1; $i <= 5; $i++)
                        <label>
                            <input type="checkbox" name="valoracion[]" value="{{ $i }}"
                                {{ in_array($i, request('valoracion', [])) ? 'checked' : '' }}>
                            {{ str_repeat('⭐', $i) }}
                        </label>
                    @endfor
                </div>
                <div class="col-md-3">
                    <select name="id_comunidad_autonoma" class="form-control">
                        <option value="">Comunidad Autónoma</option>
                        @foreach ($comunidades as $comunidad)
                            <option value="{{ $comunidad->id }}"
                                {{ request()->input('id_comunidad_autonoma') == $comunidad->id ? 'selected' : '' }}>
                                {{ $comunidad->nombre_comunidad }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="id_provincia" class="form-control">
                        <option value="">Provincia</option>
                        @foreach ($provincias as $provincia)
                            <option value="{{ $provincia->id }}"
                                {{ request()->input('id_provincia') == $provincia->id ? 'selected' : '' }}>
                                {{ $provincia->nombre_provincia }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                    <a href="{{ route('admin.index') }}" class="btn btn-secondary">Limpiar Filtros</a>
                </div>
            </div>
        </form>

        <!-- Botón para crear nuevo restaurante -->
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
