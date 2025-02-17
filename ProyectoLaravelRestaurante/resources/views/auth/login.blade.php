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
                <h1 class="titulo">¡Bienvenido a la Guía Repsol!</h1>
                <p>En este video explicamos básicamente que es lo que ofrecemos y que ventajas puedes obtener.</p>
                <br>
                <div class="contenedor-video">
                    <a href="https://youtu.be/cR395YajkeM"><img src="{{ asset('img/video.png') }}" alt="Video Guía Repsol"></a>
                </div>
            </div>
            <div class="contenedor-derecha">
                <div class="cambio">
                    <div class="cambio-der">
                        <button class="boton-cambio active" id="login-button" onclick="mostrarFormulario('login')">Iniciar sesión</button>
                    </div>
                    <div class="cambio-izq">
                        <button class="boton-cambio" id="registro-button" onclick="mostrarFormulario('registro')">Registrarse</button>
                    </div>
                </div>
                <div class="login-register">
                    <form id="login-formulario" class="form-login" action="{{ route('login') }}" method="POST">
                        @csrf
                        <label>Correo</label>
                        <input type="text" class="form-control" placeholder="Correo electrónico" name="email">
                        @if ($errors->has('email'))
                            <p class="mensaje-error">{{ $errors->first('email') }}</p>
                        @endif
                        
                        <label>Contraseña</label>
                        <input type="password" class="form-control" placeholder="Contraseña" name="password">
                        @if ($errors->has('password'))
                            <p class="mensaje-error">{{ $errors->first('password') }}</p>
                        @endif
                        
                        <button type="submit" class="btn-primary">Iniciar Sesión</button>
                    </form>
                    <form id="registro-formulario" class="form-login" action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="contenedor-columnas">
                            <!-- Columna Izquierda -->
                            <div class="registro-izq">
                                <label>Usuario</label>
                                <input type="text" class="form-control" placeholder="Usuario" name="username">
                                @error('username')
                                    <p class="mensaje-error">{{ $message }}</p>
                                @enderror
                    
                                <label>Nombre</label>
                                <input type="text" class="form-control" placeholder="Nombre" name="name">
                                @error('name')
                                    <p class="mensaje-error">{{ $message }}</p>
                                @enderror
                    
                                <label>Apellido</label>
                                <input type="text" class="form-control" placeholder="Apellido" name="apellidos_user">
                                @error('apellidos_user')
                                    <p class="mensaje-error">{{ $message }}</p>
                                @enderror
                            </div>
                    
                            <!-- Columna Derecha -->
                            <div class="registro-der">
                                <label>Correo electrónico</label>
                                <input type="text" class="form-control" placeholder="Correo electrónico" name="email">
                                @error('email')
                                    <p class="mensaje-error">{{ $message }}</p>
                                @enderror
                    
                                <label>Contraseña</label>
                                <input type="password" class="form-control" placeholder="Contraseña" name="password">
                                @error('password')
                                    <p class="mensaje-error">{{ $message }}</p>
                                @enderror
                    
                                <label>Confirmar contraseña</label>
                                <input type="password" class="form-control" placeholder="Confirmar contraseña" name="password_confirmation">
                                @error('password_confirmation')
                                    <p class="mensaje-error">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn-primary">Registrarse</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function mostrarFormulario(tipo) {
            const loginFormulario = document.getElementById('login-formulario');
            const registroFormulario = document.getElementById('registro-formulario');
            const loginButton = document.getElementById('login-button');
            const registroButton = document.getElementById('registro-button');

            if (tipo === 'login') {
                loginFormulario.style.display = 'block';
                registroFormulario.style.display = 'none';
                loginButton.classList.add('active');
                registroButton.classList.remove('active');
            } else if (tipo === 'registro') {
                loginFormulario.style.display = 'none';
                registroFormulario.style.display = 'block';
                loginButton.classList.remove('active');
                registroButton.classList.add('active');
            }
        }

        // Mostrar el formulario de login por defecto
        mostrarFormulario('login');
    </script>
</body>
</html>
