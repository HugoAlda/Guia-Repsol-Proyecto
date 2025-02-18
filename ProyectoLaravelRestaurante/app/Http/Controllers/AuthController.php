<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Mostrar la vista combinada de login y registro (dentro de la carpeta auth)
    public function showLoginForm()
    {
        return view('auth.login'); // Carga la vista auth/login.blade.php
    }

    // Procesar el inicio de sesión
    public function login(Request $request)
    {
        // Validar los datos del formulario
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Ingresa un correo electrónico válido.',
            'password.required' => 'La contraseña es obligatoria.',
        ]);

        // Intentar autenticar al usuario
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Regenerar la sesión para evitar ataques de fijación de sesión
            return redirect()->intended('/guia-repsol'); // Redirigir al usuario a su destino previsto
        }

        // Si falla la autenticación, devolver con errores
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->withInput();
    }

    // Cerrar sesión
    public function logout(Request $request)
    {
        Auth::logout(); // Cerrar la sesión del usuario
        $request->session()->invalidate(); // Invalidar la sesión actual
        $request->session()->regenerateToken(); // Regenerar el token CSRF
        return redirect('/login'); // Redirigir a la página de login
    }
}