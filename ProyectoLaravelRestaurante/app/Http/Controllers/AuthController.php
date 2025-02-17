<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Reglas de validación
        $rules = [
            'email' => ['required', 'email', 'min:5'],
            'password' => ['required'],
        ];

        // Mensajes personalizados
        $messages = [
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Ingresa un correo electrónico válido (ejemplo@dominio.com).',
            'email.min' => 'El correo electrónico debe tener al menos 5 caracteres.',
            'password.required' => 'La contraseña es obligatoria.',
        ];

        // Validar la solicitud
        $request->validate($rules, $messages);

        // Verificar si el correo existe
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'No encontramos una cuenta con este correo electrónico.'])->withInput();
        }

        // Verificar la contraseña
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'La contraseña ingresada es incorrecta.'])->withInput();
        }

        // Autenticar usuario
        Auth::login($user);
        $request->session()->regenerate();

        // Redirigir según el rol del usuario
        if ($user->id_roles == 1) {
            return redirect()->intended('/admin');
        }

        return redirect()->intended('/guia-repsol');
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Cierra la sesión del usuario
        $request->session()->invalidate(); // Invalida la sesión actual
        $request->session()->regenerateToken(); // Regenera el token CSRF
        return redirect('/login'); // Redirige a la vista combinada de login/registro
    }
}
