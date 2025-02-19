<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Restaurante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Editar Restaurante</h1>
        <form action="{{ route('admin.update', $restaurante->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="nombre_restaurante">Nombre</label>
                <input type="text" name="nombre_restaurante" class="form-control"
                    value="{{ $restaurante->nombre_restaurante }}">
                @error('nombre_restaurante')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="ubicacion_restaurante">Ubicación</label>
                <input type="text" name="ubicacion_restaurante" class="form-control"
                    value="{{ $restaurante->ubicacion_restaurante }}">
                @error('ubicacion_restaurante')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="descripcion_restaurante">Descripción</label>
                <textarea name="descripcion_restaurante" class="form-control">{{ $restaurante->descripcion_restaurante }}</textarea>
                @error('descripcion_restaurante')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="horario_restaurante">Horario</label>
                <input type="text" name="horario_restaurante" class="form-control"
                    value="{{ $restaurante->horario_restaurante }}">
                @error('horario_restaurante')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="precio_restaurante">Precio</label>
                <input type="text" name="precio_restaurante" class="form-control"
                    value="{{ $restaurante->precio_restaurante }}">
                @error('precio_restaurante')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="nombre_gerente">Nombre del Gerente</label>
                <input type="text" name="nombre_gerente" class="form-control"
                    value="{{ $restaurante->nombre_gerente }}">
                @error('nombre_gerente')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="email_gerente">Email del Gerente</label>
                <input type="email" name="email_gerente" class="form-control"
                    value="{{ $restaurante->email_gerente }}">
                @error('email_gerente')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="id_comunidad_autonoma">Comunidad Autónoma</label>
                <select class="form-control @error('id_comunidad_autonoma') is-invalid @enderror"
                    id="id_comunidad_autonoma" name="id_comunidad_autonoma">
                    <option value="">Seleccione una comunidad autónoma</option>
                    @foreach ($comunidades as $comunidad)
                        <option value="{{ $comunidad->id }}"
                            {{ old('id_comunidad_autonoma') == $comunidad->id ? 'selected' : '' }}>
                            {{ $comunidad->nombre_comunidad }}</option>
                    @endforeach
                </select>
                @error('id_comunidad_autonoma')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="id_provincia">Provincia</label>
                <select class="form-control @error('id_provincia') is-invalid @enderror" id="id_provincia"
                    name="id_provincia">
                    <option value="">Seleccione una provincia</option>
                    @foreach ($provincias as $provincia)
                        <option value="{{ $provincia->id }}"
                            {{ old('id_provincia') == $provincia->id ? 'selected' : '' }}>
                            {{ $provincia->nombre_provincia }}</option>
                    @endforeach
                </select>
                @error('id_provincia')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="img_restaurante">Imagen del Restaurante</label>
                <input type="file" name="img_restaurante" class="form-control">
                @if ($restaurante->img_restaurante)
                    <img src="{{ asset('img/logos_restaurantes/' . $restaurante->img_restaurante) }}"
                        alt="Imagen del restaurante" width="100" class="mt-2">
                @endif
                @error('img_restaurante')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-warning">Actualizar</button>
        </form>
    </div>
</body>

</html>
