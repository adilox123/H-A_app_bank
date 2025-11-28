<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Virement;

class VirementSeeder extends Seeder
{
    public function run(): void
    {
        // Virement 1
        Virement::create([
            'compte_emetteur_id' => 2,
            'compte_recepteur_id' => 3,
            'montant' => 1500.50,
        ]);

        // Virement 2
        Virement::create([
            'compte_emetteur_id' => 3,
            'compte_recepteur_id' => 2,
            'montant' => 500,
        ]);

        // Virement 3
        Virement::create([
            'compte_emetteur_id' => 2,
            'compte_recepteur_id' => 4,
            'montant' => 200,
        ]);

        // Virement 4
        Virement::create([
            'compte_emetteur_id' => 4,
            'compte_recepteur_id' => 3,
            'montant' => 750,
        ]);

        // Virement 5
        Virement::create([
            'compte_emetteur_id' => 3,
            'compte_recepteur_id' => 4,
            'montant' => 1200,
        ]);
    }
}
