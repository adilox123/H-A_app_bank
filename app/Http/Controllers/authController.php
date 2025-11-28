<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Page d'accueil / formulaire login
    public function showLoginForm()
    {
        return view('auth.login');
    }

  public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        // Régénère la session pour éviter le 419
        $request->session()->regenerate();

        $user = Auth::user();

        // Redirection selon le rôle
        if ($user->role === 'admin') {
            return redirect()->route('dashboard');
        }

        if ($user->role === 'client') {
            // IMPORTANT : respecte le nom du paramètre 'client' pour Route::resource
            return redirect()->route('clients.show', ['client' => $user->id]);
        }
    }

    return back()->withErrors(['email' => 'Identifiants ou mot de passe incorrects']);
}


    // Déconnexion
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}