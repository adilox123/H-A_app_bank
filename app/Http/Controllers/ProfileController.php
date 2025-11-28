<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Compte;
use App\Models\Virement;

class ProfileController extends Controller
{
    /**
     * Afficher la page de profil avec statistiques
     */
    public function show()
    {
        $user = Auth::user();

        // Statistiques
        $clientsCount       = User::where('role', 'client')->count();
        $accountsCreated    = Compte::where('created_at', '>=', now()->subDays(7))->count();
        $transactionVolume  = Virement::sum('montant');
        $securityAlerts     = 3; // Exemple statique ou logique dynamique

        return view('auth.profile', compact(
            'user',
            'clientsCount',
            'accountsCreated',
            'transactionVolume',
            'securityAlerts'
        ));
    }

    /**
     * Mettre à jour les informations du profil
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'name'  => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user->update($request->only(['name', 'phone']));

        return redirect()->route('profile.show')
            ->with('success', 'Profil mis à jour avec succès.');
    }

    /**
     * Changer le mot de passe
     */
    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password'     => 'required|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()
                ->with('error', 'Le mot de passe actuel est incorrect.');
        }

        $user->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect()->route('profile.show')
            ->with('success', 'Mot de passe changé avec succès.');
    }

    /**
     * Changer l'adresse email
     */
    public function changeEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'              => 'required|email|unique:users,email,' . Auth::id(),
            'email_confirmation' => 'required|same:email',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = Auth::user();
        $user->update([
            'email' => $request->email
        ]);

        return redirect()->route('profile.show')
            ->with('success', 'Adresse email mise à jour avec succès.');
    }
}

