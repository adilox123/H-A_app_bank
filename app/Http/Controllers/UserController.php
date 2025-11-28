<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Liste des clients
    public function index()
    {
        $clients = User::where('role', 'client')->get(); // filtre pour les clients seulement
        return view('clients.index', compact('clients'));
    }

    // Afficher un client + ses comptes + virements
    public function show(User $client)
    {
        // Charger les comptes du client avec virements émis et reçus
        $comptes = $client->comptes()->with([
            'virementsEmis.compteRecepteur.user',  // virements envoyés + client bénéficiaire
            'virementsRecus.compteEmetteur.user', // virements reçus + client émetteur
        ])->get();

        return view('clients.show', compact('client', 'comptes'));
    }

    // Formulaire de création
    public function create()
    {
        return view('clients.create');
    }

    // Enregistrer un nouveau client
    public function store(Request $request)
{   
    try {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => bcrypt($request->password), // HASH du mot de passe
            'role' => 'client',
        ]);

        return redirect()->route('clients.index')->with('success', 'Client ajouté avec succès.');

    } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => 'Erreur lors de la création: ' . $e->getMessage()]);
    }
}

    // Formulaire d'édition
    public function edit(User $client)
    {
        return view('clients.edit', compact('client'));
    }

    // Mettre à jour un client
    public function update(Request $request, User $client)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $client->id,
        ]);

        $client->update([
            'name' => $request->nom . ' ' . $request->prenom,
            'prenom' => $request->prenom,
            'email' => $request->email,
        ]);

        return redirect()->route('clients.index')->with('success', 'Client mis à jour avec succès.');
    }

    // Supprimer un client
    public function destroy(User $client)
    {
        $client->delete();
        return redirect()->route('clients.index')->with('success', 'Client supprimé avec succès.');
    }
}





    // ... vos autres méthodes existantes ...

    // Méthode pour changer le mot de passe
     function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        // Vérifier si le mot de passe actuel est correct
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Le mot de passe actuel est incorrect.']);
        }

        // Mettre à jour le mot de passe dans la base de données
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Mot de passe changé avec succès!');
    }

