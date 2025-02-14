<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <title>Login</title>
    <style>
        /* Estilos adicionales para los botones */
        .boton-cambio {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            margin: 5px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .boton-cambio:hover {
            background-color: #0056b3;
        }

        .enlace {
            color: #007bff;
            text-decoration: none;
            margin-top: 10px;
            display: block;
        }

        .enlace:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="fondo-difuminado">
        <div class="form">
            <div class="contenedor-izquierda">
                <h1 class="titulo">Login Guia Repsol</h1>
            </div>
            <div class="contenedor-derecha">
                <div class="cambio">
                    <button class="boton-cambio" onclick="mostrarFormulario('login')">Iniciar sesión</button>
                    <button class="boton-cambio" onclick="mostrarFormulario('registro')">Registrarse</button>
                </div>
                <div class="login-register">
                    <form id="login-formulario" action="" method="POST">
                        @csrf
                        <input type="email" class="form-control" placeholder="Correo electrónico" name="email" required>
                        <input type="password" class="form-control" placeholder="Contraseña" name="password" required>
                        <button type="submit" class="btn-primary">Iniciar Sesión</button>
                        <a href="#" class="enlace">Olvidé mi contraseña</a>
                        <a href="#" class="enlace">¿No tienes una cuenta?</a>
                        @if ($errors->has('email') || $errors->has('password'))
                            <p class="mensaje-error">Error en el login, intente nuevamente.</p>
                        @endif
                    </form>
                    <form id="registro-formulario" action="" method="POST">
                        @csrf
                        <input type="text" class="form-control" placeholder="Nombre" name="name" required>
                        <input type="text" class="form-control" placeholder="Apellido" name="apellidos_user" required>
                        <input type="email" class="form-control" placeholder="Correo electrónico" name="email" required>
                        <input type="password" class="form-control" placeholder="Contraseña" name="password" required>
                        <input type="password" class="form-control" placeholder="Confirmar contraseña" name="password_confirmation" required>
                        <button type="submit" class="btn-primary">Registrarse</button>
                        <a href="#" class="enlace">¿Ya tienes una cuenta?</a>
                        @if ($errors->has('name') || $errors->has('apellidos_user') || $errors->has('email') || $errors->has('password'))
                            <p class="mensaje-error">Error en el registro, intente nuevamente.</p>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function mostrarFormulario(tipo) {
            const loginFormulario = document.getElementById('login-formulario');
            const registroFormulario = document.getElementById('registro-formulario');

            if (tipo === 'login') {
                loginFormulario.style.display = 'block';
                registroFormulario.style.display = 'none';
            } else if (tipo === 'registro') {
                loginFormulario.style.display = 'none';
                registroFormulario.style.display = 'block';
            }
        }

        // Mostrar el formulario de login por defecto
        mostrarFormulario('login');
    </script>
</body>
</html>