<?php

namespace App\Http\Controllers;

use App\Models\Virement;
use App\Models\Compte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VirementController extends Controller
{
    public function index()
    {
        $virements = Virement::with(['compteEmetteur', 'compteRecepteur'])->get();
        return view('virements.index', compact('virements'));
    }

    public function create()
    {
        // Récupérer tous les comptes pour les deux listes
        $comptes = Compte::with('user')->get();
        
        return view('virements.create', compact('comptes'));
    }

    public function store(Request $request)
    {
        
    //dd($request->all());

        $request->validate([
            'compte_emetteur_id' => 'required|exists:comptes,id|different:compte_recepteur_id',
            'compte_recepteur_id' => 'required|exists:comptes,id',
            'montant' => 'required|numeric|min:0.01',
        ]);

        $emetteur = Compte::findOrFail($request->compte_emetteur_id);
        $recepteur = Compte::findOrFail($request->compte_recepteur_id);
        $montant = $request->montant;

        if ($emetteur->solde < $montant) {
            return back()->withErrors(['montant' => 'Solde insuffisant pour effectuer le virement.']);
        }

        DB::transaction(function () use ($emetteur, $recepteur, $montant) {
            $emetteur->decrement('solde', $montant);
            $recepteur->increment('solde', $montant);

            Virement::create([
                'compte_emetteur_id' => $emetteur->id,
                'compte_recepteur_id' => $recepteur->id,
                'montant' => $montant,
            ]);
        });

        return redirect()->route('virements.index')->with('success', 'Virement effectué avec succès.');
    }
}