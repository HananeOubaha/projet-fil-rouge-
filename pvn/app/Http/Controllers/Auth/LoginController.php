<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('signin');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        \Log::info('Tentative de connexion pour: ' . $request->email);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            
            // Redirection selon le rôle
            $user = Auth::user();
            
            // Log pour déboguer
            \Log::info('Connexion réussie pour: ' . $user->email);
            \Log::info('User role: ' . $user->role);
            \Log::info('User ID: ' . $user->id);
            
            // Vérification du rôle
            if ($user->role === 'admin') {
                \Log::info('Redirecting to admin dashboard');
                return redirect()->route('dashboardAdmin');
            } elseif ($user->role === 'psychologue') {
                \Log::info('Redirecting to psychologue dashboard');
                return redirect()->route('dashboardPsy');
            } else {
                \Log::info('Redirecting to user dashboard');
                return redirect()->route('dashboardUser');
            }
        }

        \Log::info('Échec de la connexion pour: ' . $request->email);
        return back()->withErrors([
            'email' => 'Les identifiants fournis ne correspondent pas à nos enregistrements.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
