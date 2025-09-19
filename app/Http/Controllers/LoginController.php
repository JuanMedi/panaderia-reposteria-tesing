<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'email'], // asumiendo username es email
            'password' => ['required'],
        ]);

        // Buscar usuario por email
        $user = \App\Models\User::where('email', $credentials['username'])->first();

        // Verificar que el usuario existe y la contraseña sea EXACTAMENTE igual (texto plano)
        if ($user && $user->password === $credentials['password']) {
            // Autenticar manualmente sin hash
            Auth::login($user);

            $request->session()->regenerate();

            return redirect()->intended('/dashboard'); // o al dashboard
        }

        return back()->withErrors([
            'username' => 'Credenciales inválidas',
        ]);
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
