<?php

namespace App\Http\Controllers;

use App\Models\Compte;
use App\Models\User;
use Illuminate\Http\Request;

class CompteController extends Controller
{
    public function index()
    {
        // Utilisation de la relation user()
        $comptes = Compte::with('user')->get();
        return view('comptes.index', compact('comptes'));
    }

    public function create()
    {
        // On prend seulement les utilisateurs dont le rôle est client
        $clients = User::where('role', 'client')->get();
        return view('comptes.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rib' => 'required|string|unique:comptes,rib',
            'solde' => 'required|numeric|min:0',
            'user_id' => 'required|exists:users,id',
        ]);

        Compte::create([
            'rib' => $request->rib,
            'solde' => $request->solde,
            'user_id' => $request->user_id, // ici c'est user_id
        ]);

        return redirect()->route('comptes.index')->with('success', 'Compte créé avec succès.');
    }

    public function edit(Compte $compte)
    {
        $clients = User::where('role', 'client')->get();
        return view('comptes.edit', compact('compte', 'clients'));
    }

    public function update(Request $request, Compte $compte)
    {
        $request->validate([
            'rib' => 'required|string|unique:comptes,rib,' . $compte->id,
            'solde' => 'required|numeric|min:0',
            'user_id' => 'required|exists:users,id',
        ]);

        $compte->update([
            'rib' => $request->rib,
            'solde' => $request->solde,
            'user_id' => $request->user_id, // ici aussi
        ]);

        return redirect()->route('comptes.index')->with('success', 'Compte mis à jour.');
    }

    public function destroy(Compte $compte)
    {
        $compte->delete();
        return redirect()->route('comptes.index')->with('success', 'Compte supprimé.');
    }
}
