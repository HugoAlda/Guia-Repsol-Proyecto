<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // Definir reglas de validación sin límites máximos
        $rules = [
            'name' => ['required', 'string', 'min:2'],
            'apellidos_user' => ['required', 'string', 'min:2'],
            'email' => ['required', 'string', 'email', 'unique:users,email', 'min:5'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];

        // Definir mensajes personalizados
        $messages = [
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe ser un texto válido.',
            'name.min' => 'El nombre debe tener al menos 2 caracteres.',

            'apellidos_user.required' => 'Los apellidos son obligatorios.',
            'apellidos_user.string' => 'Los apellidos deben ser un texto válido.',
            'apellidos_user.min' => 'Los apellidos deben tener al menos 2 caracteres.',

            'email.required' => 'El correo electrónico es obligatorio.',
            'email.string' => 'El correo debe ser un texto válido.',
            'email.email' => 'Ingresa un correo electrónico válido (ejemplo@dominio.com).',
            'email.unique' => 'Este correo ya está registrado.',
            'email.min' => 'El correo electrónico debe tener al menos 5 caracteres.',

            'password.required' => 'La contraseña es obligatoria.',
            'password.string' => 'La contraseña debe ser un texto válido.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ];

        // Validar la solicitud
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Generar un nombre de usuario único basado en nombre y apellidos
        $baseUsername = strtolower($request->name . '.' . $request->apellidos_user);
        $username = $baseUsername;
        $counter = 1;
        
        while (User::where('username', $username)->exists()) {
            $username = $baseUsername . $counter;
            $counter++;
        }

        // Crear usuario
        $user = User::create([
            'username' => $username,
            'name' => $request->name,
            'apellidos_user' => $request->apellidos_user,
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => Hash::make($request->password),
            'id_roles' => 2, // Asegúrate de que el rol exista
            'remember_token' => Str::random(10),
        ]);

        // Iniciar sesión automáticamente después del registro
        Auth::login($user);

        return redirect()->intended('/guia-repsol');
    }
}
