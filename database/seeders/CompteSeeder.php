<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Compte;

class CompteSeeder extends Seeder
{
    public function run(): void
    {
        // Compte pour Hiba (admin) - optionnel si tu veux juste des comptes clients
        Compte::create([
            'rib' => 'MA00000000000000000001',
            'solde' => 10000.00,
            'user_id' => 1,
        ]);

        // Compte pour Adil (client)
        Compte::create([
            'rib' => 'MA00112233445566778899',
            'solde' => 5400.75,
            'user_id' => 2,
        ]);

        // Ajout d'autres clients fictifs pour tests
        Compte::create([
            'rib' => 'MA00223344556677889900',
            'solde' => 3200.50,
            'user_id' => 3, // correspond au 3e utilisateur créé dans UserSeeder
        ]);

        Compte::create([
            'rib' => 'MA00334455667788990011',
            'solde' => 7800.00,
            'user_id' => 4,
        ]);

        Compte::create([
            'rib' => 'MA00445566778899001122',
            'solde' => 1500.25,
            'user_id' => 5,
        ]);
    }
}
