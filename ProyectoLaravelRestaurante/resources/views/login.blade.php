<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <div class="fondo-difuminado">
        <div class="form">
            <div class="contenedor-izquierda">
                <br>
                <h1 class="titulo">¡Bienvenido a la Guia Repsol!</h1>
                <p>En este video explicamos básicamente que es lo que fometamos y que ventajas puedes obtener.</p>
                <br>
                <div class="contenedor-video">
                    <a href="https://youtu.be/cR395YajkeM"><img src="{{asset('img/video.png')}}"></a>
                </div>
            </div>
            <div class="contenedor-derecha">
                <div class="cambio">
                    <button class="boton-cambio active" onclick="mostrarFormulario('login')">Iniciar sesión</button>
                    <button class="boton-cambio" onclick="mostrarFormulario('registro')">Registrarse</button>
                </div>
                <div class="login-register">
                    <form id="login-formulario" class="form-login" action="" method="POST">
                        @csrf
                        <label>Usuario o correo</label>
                        <input type="email" class="form-control" placeholder="Correo electrónico" name="email" required>
                        <label>Contraseña</label>
                        <input type="password" class="form-control" placeholder="Contraseña" name="password" required>
                        <button type="submit" class="btn-primary">Iniciar Sesión</button>
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